<?php

namespace IsoCodes;

/**
 * Class Bban.
 */
class Bban implements IsoCodeInterface
{
    /**
     * Bban validator.
     *
     * @param string $bban
     *
     * @author  petitchevalroux
     * @licence originale http://creativecommons.org/licenses/by-sa/2.0/fr/
     *
     * @see    http://dev.petitchevalroux.net/php/valider-bban-php.359.html
     * @see    http://fr.wikipedia.org/wiki/Relev%C3%A9_d%27identit%C3%A9_bancaire
     *
     * @return bool
     */
    public static function validate($bban)
    {
        if (!extension_loaded('bcmath')) {
            throw new \RuntimeException(__METHOD__.' needs the bcmath extension.');
        }

        if (23 !== mb_strlen($bban)) {
            return false;
        }
        $key = substr($bban, -2);
        $bank = substr($bban, 0, 5);
        $branch = substr($bban, 5, 5);
        $account = substr($bban, 10, 11);
        $account = strtr(
            $account,
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '12345678912345678923456789'
        );

        return 97 - bcmod(89 * $bank + 15 * $branch + 3 * $account, 97) === (int) $key;
    }
}
