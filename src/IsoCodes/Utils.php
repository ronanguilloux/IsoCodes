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
     */
    public static function unDecorate($input, $hyphens = []): string
    {
        $hyphensLength = count($hyphens);
        // removing hyphens
        for ($i = 0; $i < $hyphensLength; ++$i) {
            $input = str_replace($hyphens[$i], '', $input);
        }

        return $input;
    }

    public static function Luhn(string $value, int $length, int $weight, int $divider, $hyphens): bool
    {
        $value = self::unDecorate($value, $hyphens);
        $digits = substr($value, 0, $length - 1);
        $check = substr($value, $length - 1, 1);
        echo "\n ------------------------------------------";
        echo "\n val=$value";
        echo "\n digit=$digits";
        echo "\n check=$check";
        $expr = sprintf('/\\d{%d}/i', $length);
        if (!preg_match($expr, $value)) {
            return false;
        }

        $sum = 0;
        for ($i = 0; $i < strlen($digits); ++$i) {
            if (0 === $i % 2) {
                echo "\n %2 : add = ".(int) substr($digits, $i, 1);
                $add = (int) substr($digits, $i, 1);
            } else {
                $add = $weight * (int) substr($digits, $i, 1);
                echo "\n weighted: $weight * ".(int) substr($digits, $i, 1).' = '.$weight * (int) substr($digits, $i, 1);
                if (10 <= $add) { // '18' = 1+8 = 9, etc.
                    $strAdd = strval($add);
                    $add = intval($strAdd[0]) + intval($strAdd[1]);
                    "\n double digit, add = ".intval($strAdd[0]).' + '.intval($strAdd[1]).' = '.$add;
                }
            }
            echo "\n old sum = $sum";
            echo "\n add = $add";
            $sum += $add;
            echo "\n new sum = $sum";
            echo "\n ----";
        }

        echo "\n ($sum + $check) % $divider= ".($sum + $check) % $divider;

        return 0 === ($sum + $check) % $divider;
    }

    public static function LuhnforGTIN($value, $length, $unDecorate = true, $hyphens = []): bool
    {
        $value = $unDecorate ? self::unDecorate($value, $hyphens) : $value;
        $divider = 10;
        $multiplier = 3;

        if (strlen($value) != $length) {
            return false;
        }
        $expr = sprintf('/\\d{%d}/i', $length);
        if (!preg_match($expr, $value)) {
            return false;
        }
        if (0 === (int) $value) {
            return false;
        }

        $sum = 0;
        // the multiplier get applied differently (even or odd) according the value length
        // see https://blog.datafeedwatch.com/hubfs/blog/calculate-14-digit-gtin.png
        for ($i = 0; $i < $length; $i += 2) {
            if (0 === $length % 2) {
                $sum += $multiplier * (int) substr($value, $i, 1);
                $sum += (int) substr($value, $i + 1, 1);
            } else {
                $sum += (int) substr($value, $i, 1);
                $sum += $multiplier * (int) substr($value, $i + 1, 1);
            }
        }

        return 0 === $sum % $divider;
    }

    public static function LuhnWithWeights(string $value, int $length, array $weights, int $divider, $hyphens): bool
    {
        $value = self::unDecorate($value, $hyphens);
        $digits = substr($value, 0, $length - 1);
        $check = substr($value, $length - 1, 1);
        $expr = sprintf('/\\d{%d}/i', $length);
//        echo "\n ------------------------------------------";
//        echo "\n val=$value";
//        echo "\n digit=$digits";
//        echo "\n check=$check";
        if (!preg_match($expr, $value)) {
            return false;
        }

        $sum = 0;
        for ($i = 0; $i < strlen($digits); ++$i) {
            if (!is_numeric($digits[$i])) {
//                echo "\n" . $digits[$i] . " is not an int";
                return false;
            }
//            echo "\n" . $weights[$i] . " * " . intval($digits[$i]) . " = " .  $weights[$i] * intval($digits[$i]);
            $sum += $weights[$i] * intval($digits[$i]);
//            echo "\n new sum is $sum";
        }

        $rest = $sum % $divider;

        if (0 === $rest) {
//            echo "\n rest is zero";
            $check = $divider;
        }

//        echo "\n for value $value, rest = " . $rest;
//        echo "\n IF check $check === divider $divider - rest $rest, all good";

        return intval($check) === $divider - $rest;
    }
}
