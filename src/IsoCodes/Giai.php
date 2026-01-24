<?php

namespace IsoCodes;

/**
 * Class Giai.
 *
 * Global Individual Asset Identifier (GIAI)
 *
 * The Global Individual Asset Identifier (GIAI) is one of the two GS1 keys
 * for asset identification.
 *
 * @see https://en.wikipedia.org/wiki/Global_Individual_Asset_Identifier
 */
class Giai implements IsoCodeInterface
{
    /**
     * @param string $giai
     *
     * @return bool
     */
    public static function validate($giai)
    {
        $giai = trim((string) $giai);
        $giai = strtoupper($giai);

        // GIAI is alphanumeric, up to 30 characters.
        // It does not contain a check digit.
        return (bool) preg_match('/^[A-Z0-9]{1,30}$/', $giai);
    }
}
