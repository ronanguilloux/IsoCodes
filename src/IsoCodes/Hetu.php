<?php

namespace IsoCodes;

/**
 * Class Hetu, Finnish personal identity code (HETU, Henkilötunnus).
 *
 * @link https://en.wikipedia.org/wiki/National_identification_number#Finland
 * @link http://vrk.fi/en/personal-identity-code1
 */
class Hetu implements IsoCodeInterface
{
    /**
     * @var array
     */
    public static $centuryCodes = [
        '+' => 1800,
        '-' => 1900,
        'A' => 2000,
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
        if (!is_string($hetu) || strlen($hetu) != 11) {
            return false;
        }

        $dd = substr($hetu, 0, 2);
        $mm = substr($hetu, 2, 2);
        $yy = substr($hetu, 4, 2);
        $centuryCode = strtoupper($hetu{6});
        $id = (int) ($dd.$mm.$yy.substr($hetu, 7, 3));
        $checksum = strtoupper($hetu{10});

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
        if (!isset(static::$validationKeys{$hetuChecksumKey})
            || static::$validationKeys{$hetuChecksumKey} !== $checksum
        ) {
            return false;
        }

        return true;
    }
}
