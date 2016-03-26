<?php

namespace IsoCodes;

/**
 * Class UDI:  Unique Device Identification, the DI component, up to 14 digits GTIN
 * GTINs may be 8, 12, 13 or 14-digits in length.
 * Their data structures require up to 14-digit fields
 * and all GTIN processing software should allow for 14 digits.
 *
 * @link http://www.idtechnology.com/uploads/whitepapers/UDI_eBook.pdf
 * @link https://accessgudid.nlm.nih.gov/about-gudid#what-is-udi
 * @link http://www.gs1.org/healthcare/udi
 */
class Udi extends Gtin14 implements IsoCodeInterface
{
    /**
     * @param mixed $di - Device Identifier component
     *
     * @return bool
     */
    public static function validate($di)
    {
        $di = self::unDecorate($di);
        $validUdiLength = [8, 12, 13, 14];
        $length = strlen($di);
        if (!in_array($length, $validUdiLength)) {
            return false;
        }

        return parent::check($di, $length);
    }
}
