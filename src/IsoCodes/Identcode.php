<?php

namespace IsoCodes;

/**
 * Class Identcode.
 *
 * Identcode is a numeric code used specifically by Deutsche Post DHL.
 * It is 12 digits long (11 data digits + 1 check digit).
 * Checksum is Modulo 10 with weights 4 and 9.
 */
class Identcode implements IsoCodeInterface
{
    /**
     * @param string $identcode
     *
     * @return bool
     */
    public static function validate($identcode)
    {
        return Utils::luhnWithWeights((string) $identcode, 12, [4, 9, 4, 9, 4, 9, 4, 9, 4, 9, 4], 10, []);
    }
}
