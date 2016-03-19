<?php

namespace IsoCodes;

/**
 * Abstract Class Gtin Global Trade Item Numbers.
 *
 * @link http://www.gs1.org/how-calculate-check-digit-manually
 */
abstract class Gtin
{
    /**
     * @param string $gtin
     * @param int    $length
     *
     * @return bool
     */
    public static function check($gtin, $length)
    {
        $gtin = self::unDecorate($gtin);
        if (strlen($gtin) != $length) {
            return false;
        }
        $expr = sprintf('/\\d{%d}/i', $length);
        if (!preg_match($expr, $gtin)) {
            return false;
        }
        $check = 0;
        for ($i = 0; $i < $length; $i += 2) {
            if ($length % 2 == 0) {
                $check += 3 * substr($gtin, $i, 1);
                $check += (int) substr($gtin, $i + 1, 1);
            } else {
                $check += (int) substr($gtin, $i, 1);
                $check += 3 * substr($gtin, $i + 1, 1);
            }
        }

        return $check % 10 == 0;
    }

    /**
     * @param string $gtin
     *
     * @return string
     */
    public static function unDecorate($gtin)
    {
        // removing hyphens
        $gtin = str_replace(' ', '', $gtin);
        $gtin = str_replace('-', '', $gtin); // this is a dash
        $gtin = str_replace('‐', '', $gtin); // this is an authentic hyphen

        return $gtin;
    }
}
