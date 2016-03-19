<?php

namespace IsoCodes;

/**
 * Class Gtin13 for former EAN/UCC-13 European/International Article Number, 13 digits long codes.
 *
 * @link https://en.wikipedia.org/wiki/International_Article_Number_(EAN)
 * @link https://en.wikipedia.org/wiki/Global_Trade_Item_Number
 */
class Gtin13 extends Gtin implements IsoCodeInterface
{
    /**
     * @param mixed $gtin13
     *
     * @return bool
     */
    public static function validate($gtin13)
    {
        return parent::check($gtin13, 13);
    }
}
