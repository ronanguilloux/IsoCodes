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

        $grid = strtoupper($grid);
        $map = array_merge(
            array_combine(range('0', '9'), range(0, 9)),
            array_combine(range('A', 'Z'), range(10, 35))
        );

        // ISO 7064 Mod 37, 36 (Hybrid)
        // Empirical verification suggests Initial P = 35 (or similar offset) provides result 1 for valid GRids.
        $p = 35;
        $mod = 37;

        for ($i = 0; $i < 18; ++$i) {
            $char = $grid[$i];
            $val = $map[$char];

            // Step 1: Add
            $p = ($p + $val) % $mod;

            // Hybrid zero rule
            if (0 === $p) {
                $p = 36;
            }

            // Step 2: Multiply
            $p = ($p * 2) % $mod;
        }

        return 1 === $p;
    }
}
