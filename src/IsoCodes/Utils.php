<?php

namespace IsoCodes;

/**
 * Utils.
 */
class Utils
{
    /**
     * @param string $input
     * @param array  $hyphens
     *
     * @return string
     */
    public static function unDecorate($input, $hyphens = [])
    {
        $hyphensLength = count($hyphens);
        // removing hyphens
        for ($i = 0; $i < $hyphensLength; ++$i) {
            $input = str_replace($hyphens[$i], '', $input);
        }

        return $input;
    }

    public static function Luhn($value, $length, $weight, $divider, $hyphens): bool
    {
        $value = self::unDecorate($value, $hyphens);
        $sum = 0;

        $digits = substr($value, 0, $length - 1);
        $check = substr($value, $length - 1, 1);
        $expr = sprintf('/\\d{%d}/i', $length);
        if (!preg_match($expr, $value)) {
            return false;
        }

        for ($i = 0; $i < strlen($digits); ++$i) {
            if (0 === $i % 2) {
                $add = (int) substr($digits, $i, 1);
            } else {
                $add = $weight * (int) substr($digits, $i, 1);
                if (10 <= $add) { // '18' = 1+8 = 9, etc.
                    $strAdd = strval($add);
                    $add = intval($strAdd[0]) + intval($strAdd[1]);
                }
            }
            $sum += $add;
        }

        return 0 === ($sum + $check) % $divider;
    }
}
