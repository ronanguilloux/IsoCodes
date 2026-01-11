<?php

namespace IsoCodes;

/**
 * Class UDI:  Unique Device Identification, the DI component, up to 14 digits GTIN
 * GTINs may be 8, 12, 13 or 14-digits in length.
 * Their data structures require up to 14-digit fields
 * and all GTIN processing software should allow for 14 digits.
 *
 * @see http://www.idtechnology.com/uploads/whitepapers/UDI_eBook.pdf
 * @see https://accessgudid.nlm.nih.gov/about-gudid#what-is-udi
 * @see http://www.gs1.org/healthcare/udi
 */
class Udi extends Gtin14 implements IsoCodeInterface
{
    /**
     * @return bool
     */
    public static function validate($deviceIdentifier)
    {
        $deviceIdentifier = self::unDecorate($deviceIdentifier);
        $validUdiLength = [8, 12, 13, 14];
        $length = strlen($deviceIdentifier);
        if (! in_array($length, $validUdiLength)) {
            return false;
        }

        return parent::check($deviceIdentifier, $length);
    }
}
