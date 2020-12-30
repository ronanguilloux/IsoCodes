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
        $length = 15; // for IMEI only; IMEISV = EMEI+1, and not Luhn check

        // IMEISV?
        if ($length + 1 === strlen($imei)) {
            $expr = sprintf('/\\d{%d}/i', $length + 1);

            return boolval(preg_match($expr, $imei));
        }

        // IMEI?
        return Utils::Luhn($imei, $length, 2, 10, self::HYPHENS);
    }
}
