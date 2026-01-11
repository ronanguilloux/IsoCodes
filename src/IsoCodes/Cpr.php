<?php

namespace IsoCodes;

/**
 * Class Cpr.
 * Det Centrale Personregister (Danish Personal Identification Number).
 * NOT enforce the Modulo 11 check by default, as it was deprecated/relaxed in 2007 (some valid IDs do not respect it). Strict enforcement would reject valid modern IDs.
 *
 * @see https://en.wikipedia.org/wiki/Personal_identification_number_(Denmark)
 */
class Cpr implements IsoCodeInterface
{
    /**
     * @param string $cpr
     *
     * @return bool
     */
    public static function validate($cpr)
    {
        $cpr = trim((string) $cpr);

        if (! preg_match('/^(\d{6})[-]?(\d{4})$/', $cpr, $matches)) {
            return false;
        }

        $datePart = $matches[1];
        $sequencePart = $matches[2];

        $day = (int) substr($datePart, 0, 2);
        $month = (int) substr($datePart, 2, 2);
        $year = (int) substr($datePart, 4, 2);
        $seventhDigit = (int) $sequencePart[0];

        $century = '';

        // Logic for century resolution based on 7th digit
        if (in_array($seventhDigit, [0, 1, 2, 3], true)) {
            $century = 19;
        } elseif (4 === $seventhDigit || 9 === $seventhDigit) {
            if ($year <= 36) {
                $century = 20;
            } else {
                $century = 19;
            }
        } elseif ($seventhDigit >= 5 && $seventhDigit <= 8) {
            if ($year <= 57) {
                $century = 20;
            } else {
                $century = 18;
            }
        }

        $fullYear = (int) ($century.sprintf('%02d', $year));

        return checkdate($month, $day, $fullYear);
    }
}
