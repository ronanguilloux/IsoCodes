<?php

namespace IsoCodes;

/**
 * Class Ean13 for former EAN/UCC-13 European/International Article Number, 13 digits long codes.
 * This is a symlink, for convenience purposes only.
 *
 * @link https://en.wikipedia.org/wiki/International_Article_Number_(EAN)
 * @link https://en.wikipedia.org/wiki/Global_Trade_Item_Number
 */
class Ean13 extends Gtin13 implements IsoCodeInterface
{
    /**
     * @param mixed $ean13
     *
     * @deprecated in favor of Gtin13
     *
     * @return bool
     */
    public static function validate($ean13)
    {
        return parent::check($ean13, 13);
    }
}
