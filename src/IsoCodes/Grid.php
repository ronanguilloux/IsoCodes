<?php

namespace IsoCodes;

/**
 * Class Grid.
 * Global Release Identifier (GRid).
 *
 * @see https://en.wikipedia.org/wiki/Global_Release_Identifier
 */
class Grid implements IsoCodeInterface
{
    /**
     * @param string $grid
     *
     * @return bool
     */
    public static function validate($grid)
    {
        $grid = trim((string) $grid);

        if (18 !== strlen($grid)) {
            return false;
        }

        if (! ctype_alnum($grid)) {
            return false;
        }

        // ISO 7064 Mod 37, 36 (Hybrid)
        // Utils::iso7064Mod37_36 calculates the check digit (last char).
        // Since Grid validates the whole string, we calculate check of payload (17 chars) and match vs 18th char.
        $payload = substr($grid, 0, 17);
        $checkDigit = $grid[17];

        return Utils::iso7064Mod3736($payload) === $checkDigit;
    }
}
