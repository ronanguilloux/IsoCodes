<?php

namespace IsoCodes;

/**
 * Class Gtin12 for European/International Article Number, 12 digits long code.
 * Formerly known as UPC-A, EAN-12.
 *
 * @link https://en.wikipedia.org/wiki/Global_Trade_Item_Number
 */
class Gtin12 extends Gtin implements IsoCodeInterface
{
    /**
     * @param mixed $gtin12
     *
     * @return bool
     */
    public static function validate($gtin12)
    {
        return parent::check($gtin12, 12);
    }
}
