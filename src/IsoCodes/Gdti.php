<?php

namespace IsoCodes;

/**
 * Class Gdti for GS1 Global Document Type Identifier (GDTI)
 * used by companies to identify documents, including the class or type of each document.
 *
 * @link http://www.gs1.org/global-document-type-identifier-gdti
 * @link http://www.gs1.org/docs/idkeys/GS1_GDTI_Executive_Summary.pdf
 * @link https://en.wikipedia.org/wiki/Global_Document_Type_Identifier
 */
class Gdti extends Gtin13 implements IsoCodeInterface
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
        if (strlen($grai) > 30) {
            return false;
        }
        $gtin13 = substr($grai, 0, 13);

        return parent::check($gtin13, 13); // optional serial component not to be checked
    }
}
