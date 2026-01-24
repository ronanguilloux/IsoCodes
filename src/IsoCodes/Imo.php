<?php

namespace IsoCodes;

/**
 * Class Imo.
 *
 * International Maritime Organization (IMO) ship identification number.
 *
 * @see https://en.wikipedia.org/wiki/International_Maritime_Organization
 */
class Imo implements IsoCodeInterface
{
    /**
     * @param string $imo
     *
     * @return bool
     */
    public static function validate($imo)
    {
        $imo = (string) $imo;
        $imo = Utils::unDecorate($imo, ['IMO', 'imo', ' ']);

        if (7 !== strlen($imo) || ! ctype_digit($imo)) {
            return false;
        }

        $digits = substr($imo, 0, 6);
        $check = (int) substr($imo, 6, 1);

        $weights = [7, 6, 5, 4, 3, 2];
        $sum = 0;

        foreach ($weights as $key => $weight) {
            $sum += $weight * (int) $digits[$key];
        }

        return $check === ($sum % 10);
    }
}
