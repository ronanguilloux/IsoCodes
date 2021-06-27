<?php

namespace IsoCodes;

/**
 * Class Gtin8 for former EAN-8 European/International Article Number, 8 digits long codes.
 *
 * GTIN-8 (formerly EAN-8) is derived from EAN-13, introduced for use on small packages where an EAN-13 barcode would be too large;
 * for example on cigarettes, pencils, and chewing gum packets.
 *
 * @see https://en.wikipedia.org/wiki/EAN-8
 * @see https://en.wikipedia.org/wiki/International_Article_Number_(EAN)
 * @see https://en.wikipedia.org/wiki/Global_Trade_Item_Number
 */
class Gtin8 extends Gtin implements IsoCodeInterface
{
    /**
     * @param mixed $gtin8
     */
    public static function validate($gtin8)
    {
        return parent::check($gtin8, 8);
    }
}
