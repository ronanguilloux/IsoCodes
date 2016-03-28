<?php

namespace IsoCodes;

/**
 * Class Ismn for International Standard Music Number or ISMN (ISO 10957)
 * From 1 January 2008 the ISMN was defined as a thirteen digit identifier beginning 979-0 where the zero replaced M
 * in the old-style number. The resulting number is identical with its EAN-13 number as encoded in the item's barcode.
 *
 * @link https://en.wikipedia.org/wiki/International_Standard_Music_Number
 * @link http://www.ismn-international.org/
 * @link http://www.ismn-international.org/whatis.html
 * @link https://en.wikipedia.org/wiki/International_Article_Number_(EAN)
 */
class Ismn extends Gtin13 implements IsoCodeInterface
{
    /**
     * @param mixed $ean13
     *
     * @return bool
     */
    public static function validate($ean13)
    {
        return parent::check($ean13, 13);
    }
}
