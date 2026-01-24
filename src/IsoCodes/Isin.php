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
        $isin = strtoupper((string) $isin);
        if (! preg_match('/^[A-Z]{2}[A-Z0-9]{9}[0-9]$/i', $isin)) {
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

        // Verification with Luhn algorithm
        $numericIsin = $base10.$checksum;

        return Utils::luhn($numericIsin, strlen($numericIsin), []);
    }
}
