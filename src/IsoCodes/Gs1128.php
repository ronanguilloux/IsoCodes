<?php

namespace IsoCodes;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class Gs1128.
 *
 * GS1-128 (UCC/EAN-128)
 *
 * Checks for validity of GS1-128 barcodes strings.
 * Supports Human Readable format (01)... and Raw format 01...
 */
class Gs1128 implements IsoCodeInterface
{
    /**
     * Application Identifiers definitions
     * 'len': max length of data (excluding AI)
     * 'var': true if variable length, false if fixed
     * 'type': 'n' (numeric), 'an' (alphanumeric), 'd' (date YYMMDD).
     */
    public const AIS = [
        '00' => ['len' => 18, 'var' => false, 'type' => 'n'], // SSCC
        '01' => ['len' => 14, 'var' => false, 'type' => 'n'], // GTIN
        '02' => ['len' => 14, 'var' => false, 'type' => 'n'], // GTIN of Contained Trade Items
        '10' => ['len' => 20, 'var' => true, 'type' => 'an'], // Batch/Lot
        '11' => ['len' => 6, 'var' => false, 'type' => 'd'], // Prod Date
        '13' => ['len' => 6, 'var' => false, 'type' => 'd'], // Pack Date
        '15' => ['len' => 6, 'var' => false, 'type' => 'd'], // Best Before
        '17' => ['len' => 6, 'var' => false, 'type' => 'd'], // Expiration
        '21' => ['len' => 20, 'var' => true, 'type' => 'an'], // Serial Number
        '37' => ['len' => 8, 'var' => true, 'type' => 'n'],  // Count of Items
        '420' => ['len' => 20, 'var' => true, 'type' => 'an'], // Ship to Postal Code
        '92' => ['len' => 30, 'var' => true, 'type' => 'an'], // Company Internal
        '400' => ['len' => 30, 'var' => true, 'type' => 'an'], // Purchase Order
        // Add more common AIs as needed for robustness, but adhering to requested scope
    ];

    /**
     * @param string $gs1128
     * @param array  $options
     *
     * @return bool
     */
    public static function validate($gs1128, $options = [])
    {
        $resolver = new OptionsResolver();
        $resolver->setDefaults(['max_length' => 48]);
        $resolver->setAllowedTypes('max_length', 'int');

        $options = $resolver->resolve($options);

        return self::validateGs1String((string) $gs1128, $options['max_length']);
    }

    /**
     * @param string $gs1String
     * @param int    $maxLength
     *
     * @return bool
     */
    protected static function validateGs1String($gs1String, $maxLength)
    {
        if (empty($gs1String)) {
            return false;
        }

        // Check total length
        // Ideally we check data length, but rough check first
        $clean = str_replace(['(', ')'], '', $gs1String);
        if (strlen($clean) > $maxLength) {
            return false;
        }

        // Pre-processing
        $parts = [];
        if (0 === strpos($gs1String, '(')) {
            // Human Readable Format: (01)123(15)456...
            if (! preg_match_all('/\(([0-9]{2,4})\)([^(\)]+)/', $gs1String, $matches, PREG_SET_ORDER)) {
                return false;
            }
            foreach ($matches as $match) {
                $parts[] = ['ai' => $match[1], 'value' => $match[2]];
            }
        } else {
            // Raw Format: 01123...
            // This is harder, need to parse using AI table
            $remaining = $gs1String;
            while (strlen($remaining) > 0) {
                $ai = null;
                $def = null;

                // Try 2, 3, 4 digit AIs
                foreach ([2, 3, 4] as $aiLen) {
                    $tryAi = substr($remaining, 0, $aiLen);
                    if (isset(self::AIS[$tryAi])) {
                        $ai = $tryAi;
                        $def = self::AIS[$tryAi];

                        break;
                    }
                }

                if (! $ai) {
                    return false; // Unknown AI
                }

                $remaining = substr($remaining, strlen($ai));

                if ($def['var']) {
                    // Variable length: greedy consume up to max len
                    // In raw format without separators (FNC1), variable length AIs SHOULD be at end
                    // or followed by something we can't easily determine.
                    // Simplified logic: consume up to max len or end of string.
                    // But if there are subsequent AIs, raw parsing is ambiguous without FNC1 or knowing next AI.
                    // For this exercise, assume variable length field consumes everything left or up to max len.
                    // A better approach for raw variable: peek ahead?
                    // User requirement: "010123...15251231".
                    // 01 is fixed 14. 15 is fixed 6.
                    // If we have "10ABC15..." (10 is variable), parsing "ABC15..." is ambiguous if '1' is part of batch or AI 15?
                    // Standard parser greedy matches? Or FNC1 (\x1d) is delimiter.
                    // Let's implement basics: fixed length consumes fixed. Variable length consumes until FNC1 or end.
                    // If no FNC1, valid raw string usually places var length at end.

                    // Simple heuristic for now: check if FNC1 exists? User did not allow special chars in prompt specs easily.
                    // Let's assume standard behavior: fixed length takes priority.

                    $len = min(strlen($remaining), $def['len']);
                    $value = substr($remaining, 0, $len);
                    $remaining = substr($remaining, $len);
                } else {
                    // Fixed length
                    if (strlen($remaining) < $def['len']) {
                        return false;
                    }
                    $value = substr($remaining, 0, $def['len']);
                    $remaining = substr($remaining, $def['len']);
                }
                $parts[] = ['ai' => $ai, 'value' => $value];
            }
        }

        // Validation Loop
        foreach ($parts as $part) {
            $ai = $part['ai'];
            $val = $part['value'];

            if (! isset(self::AIS[$ai])) {
                return false;
            }
            $def = self::AIS[$ai];

            // 1. Check Length
            if (strlen($val) > $def['len']) {
                return false;
            }
            if (! $def['var'] && strlen($val) !== $def['len']) {
                return false;
            }

            // 2. Check Type
            if ('n' === $def['type'] || 'd' === $def['type']) {
                if (! ctype_digit($val)) {
                    return false;
                }
            }
            // 'an' is pretty much anything allowed in GS1-128 (ASCII 32-126)
            if ('an' === $def['type'] && preg_match('/^0+$/', $val)) {
                return false;
            }

            // 3. Specific Validations
            if ('00' === $ai) {
                // SSCC
                if (! Sscc::validate($val)) {
                    return false;
                }
            } elseif ('01' === $ai) {
                // GTIN
                if (! Gtin::check($val, 14)) {
                    return false;
                }
            } elseif ('d' === $def['type']) {
                // Date YYMMDD
                $y = (int) substr($val, 0, 2);
                $m = (int) substr($val, 2, 2);
                $d = (int) substr($val, 4, 2);

                // Allow "00" day for "last day of month" logic in GS1?
                // For strict "valid calendar date" required by user, 00 is invalid.
                // We'll use checkdate. Assume 20xx for YY.
                // checkdate(month, day, year)
                if (! checkdate($m, $d, 2000 + $y)) {
                    return false;
                }
            }
        }

        return true;
    }
}
