<?php

namespace IsoCodes;

/**
 * Class Ein.
 * Employer Identification Number (EIN).
 *
 * @see https://en.wikipedia.org/wiki/Employer_Identification_Number
 */
class Ein implements IsoCodeInterface
{
    /**
     * @param string $ein
     *
     * @return bool
     */
    public static function validate($ein)
    {
        $ein = trim((string) $ein);

        // Standard Format: XX-XXXXXXX or XXXXXXXXX
        return (bool) preg_match('/^\d{2}-?\d{7}$/', $ein);
    }
}
