<?php

namespace IsoCodes;

/**
 * Class Grai for Global Returnable Asset Identifier, from GS1
 * Used for the management of reusable transport items, transport equipment, and tools.
 *
 * @link http://www.gs1.org/grai
 * @link http://www.gs1.org/docs/idkeys/GS1_GRAI_Executive_Summary.pdf
 * @link https://en.wikipedia.org/wiki/Global_Returnable_Asset_Identifier
 */
class Grai extends Gtin13 implements IsoCodeInterface
{
    /**
     * @param mixed $grai
     *
     * @return bool
     */
    public static function validate($grai)
    {
        if (strlen($grai) < 13) {
            return false;
        }
        $grai = self::unDecorate($grai);
        if (0 !== (int) $grai[0]) {
            return false;
        }
        $grai = substr($grai, 1, strlen($grai) - 1);
        if (strlen($grai) > 29) {
            return false;
        }
        $gtin13 = substr($grai, 0, 13);
        if (!ctype_alnum(substr($grai, 13, strlen($grai)))) {
            return false;
        }

        return parent::check($gtin13, 13); // optional serial component not to be checked
    }
}
