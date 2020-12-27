<?php

namespace IsoCodes;

/**
 * Class Abn, Australian Business Number.
 *
 * @see https://en.wikipedia.org/wiki/Australian_Business_Number
 * @see https://abr.business.gov.au/
 */
class Abn implements IsoCodeInterface
{
    /**
     * Validate an Australian Business Number (ABN).
     *
     * @author Paul Ferrett, 2009 (http://www.paulferrett.com)
     *
     * @param string $abn
     *
     * @return bool
     */
    public static function validate($abn)
    {
        $weights = [10, 1, 3, 5, 7, 9, 11, 13, 15, 17, 19];
        $sum = 0;
        $abn = preg_replace('/[^0-9]/', '', $abn);
        $abn = Utils::unDecorate($abn, [' ']);
        if (11 !== mb_strlen($abn)) {
            return false;
        }
        $abn[0] = ((int) $abn[0] - 1); // Subtract one from first digit
        foreach (str_split($abn) as $key => $digit) {
            $sum += ($digit * $weights[$key]);
        }
        if (($sum % 89) != 0) {
            return false;
        }

        return true;
    }
}
