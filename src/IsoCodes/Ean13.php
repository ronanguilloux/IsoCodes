<?php

namespace IsoCodes;

class Ean13 implements IsoCodeInterface
{

    public static function validate($ean13)
    {
        if (strlen($ean13) != 13) return false;
        if (!is_numeric($ean13)) return false;

        // The weight for a specific position in the EAN code is either 3 or 1,
        // which alternate so that the final data digit has a weight of 3;
        // In an EAN-13 code, the weight is 3 for even positions and 1 for odd positions;
        $sum = 0;
        for ($index = 0; $index < 12; $index ++) {
            $number = (int) $ean13[$index];
            if (($index % 2) != 0) $number *= 3;
            $sum += $number;
        }

        $key = $ean13[12];  // Ean13's checksum digit key

        // The Check digit, a single checksum digit, is computed modulo 10
        if (10 - ($sum % 10) != $key) return false; else return true;
    }
}
