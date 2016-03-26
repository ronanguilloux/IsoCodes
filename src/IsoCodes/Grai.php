<?php

namespace IsoCodes;

/**
 * Class Grai for Global Returnable Asset Identifier, from GS1
 * Used for the management of reusable transport items, transport equipment, and tools.
 *
 * @link http://www.gs1.org/grai
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
        $grai = self::unDecorate($grai);
        if (strlen($grai) < 13 || strlen($grai) >= 30) {
            return false;
        }
        $gtin13 = substr($grai, 0, 13);

        return parent::check($gtin13, 13); // optional serial component not to be checked
    }
}
