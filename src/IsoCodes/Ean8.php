<?php

namespace IsoCodes;

/**
 * Class Ean8 for former EAN/UCC-8 European/International Article Number, 8 digits long codes.
 * This is a symlink, for convenience purposes only.
 *
 * @link https://en.wikipedia.org/wiki/International_Article_Number_(EAN)
 * @link https://en.wikipedia.org/wiki/Global_Trade_Item_Number
 */
class Ean8 extends Gtin8 implements IsoCodeInterface
{
    /**
     * @param mixed $ean8
     *
     * @deprecated in favor of Gtin8
     *
     * @return bool
     */
    public static function validate($ean8)
    {
        return parent::check($ean8, 8);
    }
}
