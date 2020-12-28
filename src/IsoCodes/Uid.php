<?php

namespace IsoCodes;

/**
 * Class Uid:
 * Switzerland Business Orgs VAT Number (UID) Validation
 * Business Identification Number (BID) or Unternehmens-Identifikationsnummer (UID).
 *
 * @see https://vatstack.com/articles/switzerland-vat-number-validation
 * @see https://www.estv.admin.ch/estv/fr/home/mehrwertsteuer/fachinformationen/steuerpflicht/unternehmens-identifikationsnummer--uid-.html
 * @see https://www.ech.ch/de/dokument/57be808d-9a03-4e9e-a2c5-65f08ca78e44
 */
class Uid implements IsoCodeInterface
{
    /**
     * @param mixed $uid - Swiss Business Identification Number
     *
     * @return bool
     */
    public static function validate($uid)
    {
        $multipliers = [5, 4, 3, 2, 7, 6, 5, 4];
        $result = 0;
        $uid = Utils::unDecorate(strval($uid), [' ', '.', '-', '—']);

        if (str_contains($uid, 'CHE') || str_contains($uid, 'ADM')) {
            $uid = substr(strval($uid), 3, 9);
        }

        $uid = substr($uid, 0, 9);

        if (9 != strlen($uid)) {
            return false;
        }

        foreach ($multipliers as $key => $multiplier) {
            if (!is_numeric($uid[$key])) {
                return false;
            }
            $result += $uid[$key] * $multiplier;
        }

        $rest = $result % 11;

        if (0 === $rest) {
            return true;
        }

        return intval($uid[8]) === 11 - $rest;
    }
}
