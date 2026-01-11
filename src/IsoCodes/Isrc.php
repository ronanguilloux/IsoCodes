<?php

namespace IsoCodes;

/**
 * Class Isrc.
 * International Standard Recording Code.
 *
 * @see https://en.wikipedia.org/wiki/International_Standard_Recording_Code
 */
class Isrc implements IsoCodeInterface
{
    /**
     * @param string $isrc
     *
     * @return bool
     */
    public static function validate($isrc)
    {
        $isrc = trim((string) $isrc);

        // Standard Format: CC-XXX-YY-NNNNN or CCXXXYYNNNNN
        // CC: 2 letters (Country)
        // XXX: 3 alphanumeric (Registrant)
        // YY: 2 digits (Year)
        // NNNNN: 5 digits (Designation)

        return (bool) preg_match('/^[A-Za-z]{2}-?[A-Za-z0-9]{3}-?[0-9]{2}-?[0-9]{5}$/', $isrc);
    }
}
