<?php

namespace IsoCodes;

/**
 * Class Ean13.
 */
class Ean13 implements IsoCodeInterface
{
    /**
     * @param mixed $ean13
     *
     * @return bool
     */
    public static function validate($ean13)
    {
        // removing hyphens
        $ean13 = str_replace(' ', '', $ean13);
        $ean13 = str_replace('-', '', $ean13); // this is a dash
        $ean13 = str_replace('‐', '', $ean13); // this is an authentic hyphen
        if (strlen($ean13) != 13) {
            return false;
        }
        if (!preg_match('/\\d{13}/i', $ean13)) {
            return false;
        }
        $check = 0;
        for ($i = 0; $i < 13; $i += 2) {
            $check += (int) substr($ean13, $i, 1);
            $check += 3 * substr($ean13, $i + 1, 1);
        }

        return $check % 10 == 0;
    }
}
