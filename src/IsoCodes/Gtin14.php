<?php

namespace IsoCodes;

/**
 * Class Gtin14 for European/International Article Number, 14 digits long code.
 *
 * @link https://en.wikipedia.org/wiki/International_Article_Number_(EAN)
 */
class Gtin14 extends Gtin implements IsoCodeInterface
{
    /**
     * @param mixed $gtin14
     *
     * @return bool
     */
    public static function validate($gtin14)
    {
        return parent::check($gtin14, 14);
    }
}
