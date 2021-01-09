<?php

namespace IsoCodes;

/**
 * Abstract Class Luhn.
 *
 * @see https://en.wikipedia.org/wiki/Luhn_algorithm
 */
abstract class Luhn
{
    /**
     * @param string $luhn
     * @param int    $length
     * @param bool   $unDecorate
     * @param array  $hyphens
     */
    public static function check($luhn, $length, $unDecorate = true, $hyphens = []): bool
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

        // the multiplier get applied differently (even or odd) according the value length
        // see https://blog.datafeedwatch.com/hubfs/blog/calculate-14-digit-gtin.png
        for ($i = 0; $i < $length; $i += 2) {
            if (0 == $length % 2) {
                $check += 3 * (int) substr($luhn, $i, 1);
                $check += (int) substr($luhn, $i + 1, 1);
            } else {
                $check += (int) substr($luhn, $i, 1);
                $check += 3 * (int) substr($luhn, $i + 1, 1);
            }
        }

        return 0 == $check % 10;
    }

    /**
     * @param string $luhn
     * @param array  $hyphens
     */
    public static function unDecorate($luhn, $hyphens = []): string
    {
        return Utils::unDecorate($luhn, $hyphens);
    }
}
