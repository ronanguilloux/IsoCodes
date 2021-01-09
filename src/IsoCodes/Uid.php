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
    const HYPHENS = [' ', '.', '-', '—']; // regular dash, authentic hyphen (rare!) and space

    /**
     * @param mixed $uid - Swiss Business Identification Number
     *
     * @return bool
     */
    public static function validate($uid)
    {
        $multipliers = [5, 4, 3, 2, 7, 6, 5, 4];
        $result = 0;
        $uid = Utils::unDecorate(strval($uid), self::HYPHENS);

        if (false !== strpos($uid, 'CHE', 0) || false !== strpos($uid, 'ADM', 0)) {
            $uid = substr(strval($uid), 3, 9);
        }

        $uid = substr($uid, 0, 9);

        return Utils::LuhnWithWeights($uid, 9, $multipliers, 11, self::HYPHENS);
    }
}
