<?php

namespace IsoCodes;

/**
 * Class Leitcode.
 *
 * Leitcode is a numeric code used specifically by Deutsche Post DHL.
 * It is 14 digits long (13 data digits + 1 check digit).
 * Checksum is Modulo 10 with weights 4 and 9.
 */
class Leitcode implements IsoCodeInterface
{
    /**
     * @param string $leitcode
     *
     * @return bool
     */
    public static function validate($leitcode)
    {
        return Utils::luhnWithWeights((string) $leitcode, 14, [4, 9, 4, 9, 4, 9, 4, 9, 4, 9, 4, 9, 4], 10, []);
    }
}
