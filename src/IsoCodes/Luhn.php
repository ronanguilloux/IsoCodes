<?php

namespace IsoCodes;

/**
 * Abstract Class Luhn.
 *
 * @link https://en.wikipedia.org/wiki/Luhn_algorithm
 */
abstract class Luhn
{
    /**
     * @param string $luhn
     * @param int    $length
     * @param bool   $unDecorate
     * @param array  $hyphens
     *
     * @return bool
     */
    public static function check($luhn, $length, $unDecorate = true, $hyphens = [])
    {
        $luhn = $unDecorate ? self::unDecorate($luhn, $hyphens) : $luhn;
        if (strlen($luhn) != $length) {
            return false;
        }
        $expr = sprintf('/\\d{%d}/i', $length);
        if (!preg_match($expr, $luhn)) {
            return false;
        }
        if (0 === (int) $luhn) {
            return false;
        }
        $check = 0;

        for ($i = 0; $i < $length; $i += 2) {
            if ($length % 2 == 0) {
                $check += 3 * (int) substr($luhn, $i, 1);
                $check += (int) substr($luhn, $i + 1, 1);
            } else {
                $check += (int) substr($luhn, $i, 1);
                $check += 3 * (int) substr($luhn, $i + 1, 1);
            }
        }

        return $check % 10 == 0;
    }

    /**
     * @param string $luhn
     * @param array  $hyphens
     *
     * @return string
     */
    public static function unDecorate($luhn, $hyphens = [])
    {
        $hyphensLength = count($hyphens);
        // removing hyphens
        for ($i = 0; $i < $hyphensLength; ++$i) {
            $luhn = str_replace($hyphens[$i], '', $luhn);
        }

        return $luhn;
    }
}
