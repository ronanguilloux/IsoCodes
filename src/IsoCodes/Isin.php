<?php

namespace IsoCodes;

/**
 * Class Isin.
 */
class Isin implements IsoCodeInterface
{
    /**
     * Validate an ISIN (International Securities Identification Number, ISO 6166).
     *
     * @param string $isin ISIN to be validated
     *
     * @see https://en.wikipedia.org/wiki/International_Securities_Identification_Number#Examples
     *
     * @return bool true if ISIN is valid
     */
    public static function validate($isin)
    {
        $isin = strtoupper($isin);
        if (!preg_match('/^[A-Z]{2}[A-Z0-9]{9}[0-9]$/i', $isin)) {
            return false;
        }

        $base10 = $rightmost = '';
        $left = $right = [];

        $payload = substr($isin, 0, 11);
        $length = strlen($payload);

        // Converting letters to digits
        for ($i = 0; $i < $length; ++$i) {
            $digit = substr($payload, $i, 1);
            $base10 .= (string) base_convert($digit, 36, 10);
        }
        $checksum = substr($isin, 11, 1);
        $base10 = strrev($base10);
        $length = strlen($base10);

        // distinguishing leftmost from rightmost
        for ($i = $length - 1; $i >= 0; --$i) {
            $digit = substr($base10, $i, 1);
            $rightmost = 'left';
            if ((($length - $i) % 2) == 0) {
                $left[] = $digit;
            } else {
                $right[] = $digit;
                $rightmost = 'right';
            }
        }

        // Multiply the group containing the rightmost character
        $simple = ('left' === $rightmost) ? $right : $left;
        $doubled = ('left' === $rightmost) ? $left : $right;
        $doubledCount = count($doubled);
        for ($i = 0; $i < $doubledCount; ++$i) {
            $digit = $doubled[$i] * 2;
            if ($digit > 9) {
                $digit = array_sum(str_split($digit));
            }
            $doubled[$i] = $digit;
        }
        $tot = array_sum($simple) + array_sum($doubled);
        $moduled = 10 - ($tot % 10);

        return (int) $moduled === (int) $checksum;
    }
}
