<?php

namespace IsoCodes;


/**
 * Class Isbn10
 *
 * @package IsoCodes
 */
class Isbn10 implements IsoCodeInterface
{

    /**
     * @param mixed $isbn10
     *
     * @return bool
     */
    public static function validate($isbn10)
    {
        // removing hyphens
        $isbn10 = str_replace(" ", "", $isbn10);
        $isbn10 = str_replace("-", "", $isbn10); // this is a dash
        $isbn10 = str_replace("‐", "", $isbn10); // this is an authentic hyphen
        if (strlen($isbn10) != 10) {
            return false;
        }
        if (!is_numeric($isbn10)) {
            return false;
        }

        if (!preg_match("/\\d{9}[0-9xX]/i", $isbn10)) {
            return false;
        }
        $check = 0;
        for ($i = 0; $i < 10; $i++) {
            if ($isbn10[$i] == "X") {
                $check += 10 * intval(10 - $i);
            }
            $check += intval($isbn10[$i]) * intval(10 - $i);
        }

        return $check % 11 == 0;
    }
}
