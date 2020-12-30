<?php

namespace IsoCodes;

/**
 * Class Imei for International Mobile Equipment Identity (IMEI)
 * IMEI is a number, usually unique,
 * to identify 3GPP and iDEN mobile phones, as well as some satellite phones.
 *
 * The IMEI (15 decimal digits: 14 digits plus a check digit)
 * or IMEISV (16 decimal digits: 14 digits plus two software version digits)
 * includes information on the origin, model, and serial number of the device.
 *
 * As of 2004, the format of the IMEI is AA-BBBBBB-CCCCCC-D,
 * although it may not always be displayed this way.
 *
 * The IMEISV does not have the Luhn check digit
 * but instead has two digits for the Software Version Number (SVN), making the format AA-BBBBBB-CCCCCC-EE
 *
 * @see https://en.wikipedia.org/wiki/International_Mobile_Equipment_Identity
 */
class Imei implements IsoCodeInterface
{
    const HYPHENS = ['‐', '-', ' ']; // regular dash, authentic hyphen (rare!) and space

    /**
     * Basic Luhn check.
     *
     * @param mixed $imei
     *
     * @return bool
     */
    public static function validate($imei)
    {
        $imei = Utils::unDecorate($imei, self::HYPHENS);
        $length = 15; // for EMEI only, IMEISV is +1
        $divider = 10;
        $weight = 2;
        $sum = 0;

        // IMEISV?
        if ($length + 1 === strlen($imei)) {
            $expr = sprintf('/\\d{%d}/i', $length + 1);

            return boolval(preg_match($expr, $imei));
        }

        // IMEI?
        $body = substr($imei, 0, $length - 1);
        $check = substr($imei, $length - 1, 1);
        $expr = sprintf('/\\d{%d}/i', $length);
        if (!preg_match($expr, $imei)) {
            return false;
        }

        for ($i = 0; $i < strlen($body); ++$i) {
            if (0 === $i % 2) {
                $add = (int) substr($body, $i, 1);
            } else {
                $add = $weight * (int) substr($body, $i, 1);
                if (10 <= $add) { // '18' = 1+8 = 9, etc.
                    $strAdd = strval($add);
                    $add = intval($strAdd[0]) + intval($strAdd[1]);
                }
            }
            $sum += $add;
        }

        return 0 === ($sum + $check) % $divider;
    }
}
