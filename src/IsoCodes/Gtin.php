<?php

namespace IsoCodes;

/**
 * Abstract Class Gtin Global Trade Item Numbers.
 *
 * @link http://www.gs1.org/how-calculate-check-digit-manually
 */
abstract class Gtin extends Luhn
{
    const HYPHENS = ['‐', '-', ' ']; // regular dash, authentic hyphen (rare!) and space

    /**
     * {@inheritdoc}
     */
    public static function check($gtin, $length, $unDecorate = true, $hyphens = self::HYPHENS)
    {
        return parent::check($gtin, $length, true, $hyphens);
    }

    /**
     * {@inheritdoc}
     */
    public static function unDecorate($gtin, $hyphens = self::HYPHENS)
    {
        return parent::unDecorate($gtin, $hyphens);
    }
}
