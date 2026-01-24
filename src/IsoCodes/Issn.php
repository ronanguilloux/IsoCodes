<?php

namespace IsoCodes;

/**
 * Class Issn.
 *
 * @see https://en.wikipedia.org/wiki/ISSN
 */
class Issn implements IsoCodeInterface
{
    /**
     * @param string $issn
     *
     * @return bool
     */
    public static function validate($issn)
    {
        return Utils::luhnWithWeights((string) $issn, 8, [8, 7, 6, 5, 4, 3, 2], 11, ['-', ' ']);
    }
}
