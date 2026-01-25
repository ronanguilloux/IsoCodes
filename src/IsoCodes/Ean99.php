<?php

namespace IsoCodes;

/**
 * Class Ean99 for EAN-99 (in-store coupons), a subset of EAN-13 starting with 99.
 *
 * @see https://en.wikipedia.org/wiki/International_Article_Number
 */
class Ean99 extends Gtin13 implements IsoCodeInterface
{
    /**
     * @param string $ean99
     *
     * @return bool
     */
    public static function validate($ean99)
    {
        $ean99UnDecorated = self::unDecorate($ean99);

        if (! str_starts_with($ean99UnDecorated, '99')) {
            return false;
        }

        return parent::validate($ean99);
    }
}
