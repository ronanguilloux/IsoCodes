<?php

namespace IsoCodes;

/**
 * Class Hetu, Finnish personal identity code (HETU, Henkilötunnus).
 * New punctuation marks for personal identity codes 1 January 2023.
 *
 * @see https://en.wikipedia.org/wiki/National_identification_number#Finland
 * @see https://dvv.fi/en/reform-of-personal-identity-code
 */
class Hetu implements IsoCodeInterface
{
    /**
     * @var array
     */
    public static $centuryCodes = [
        '+' => 1800,
        '-' => 1900,
        'Y' => 1900,
        'X' => 1900,
        'W' => 1900,
        'V' => 1900,
        'U' => 1900,
        'A' => 2000,
        'B' => 2000,
        'C' => 2000,
        'D' => 2000,
        'E' => 2000,
        'F' => 2000,
    ];

    /**
     * @var string
     */
    public static $validationKeys = '0123456789ABCDEFHJKLMNPRSTUVWXY';

    /**
     * HETU validator.
     *
     * @param string $hetu
     *
     * @return bool
     */
    public static function validate($hetu)
    {
        if (!is_string($hetu) || 11 != strlen($hetu)) {
            return false;
        }

        $dd = substr($hetu, 0, 2);
        $mm = substr($hetu, 2, 2);
        $yy = substr($hetu, 4, 2);
        $centuryCode = strtoupper($hetu[6]);
        $id = (int) ($dd.$mm.$yy.substr($hetu, 7, 3));
        $checksum = strtoupper($hetu[10]);

        if ($dd < 1 || $dd > 31) {
            return false;
        }

        if ($mm < 1 || $mm > 12) {
            return false;
        }

        if (!is_numeric($yy)) {
            return false;
        }

        if (!array_key_exists($centuryCode, static::$centuryCodes)) {
            return false;
        }

        $hetuChecksumKey = $id % strlen(static::$validationKeys);
        if (!isset(static::$validationKeys[$hetuChecksumKey])
            || static::$validationKeys[$hetuChecksumKey] !== $checksum
        ) {
            return false;
        }

        return true;
    }
}
