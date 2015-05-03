<?php

namespace IsoCodes;

/**
 * Class Nif.
 *
 * About Tax Identification Number (Spain's Número de Identificación Fiscal, NIF)
 * or Foreign Identification Number (Spain's Número de Identificación de Extranjeror, NIE):
 * The applicable Spanish legislation currently requires that any individual
 * or legal entity with economic or professional interests in Spain,
 * or involved in a relevant way for tax purposes,
 * must hold a tax identification number (in the case of legal entities)
 * or a foreigner identity number (for individuals).
 *
 * @source  https://github.com/alrik11es/spanish-utils
 *
 * @link    http://es.wikipedia.org/wiki/NIF
 * @link    http://www.investinspain.org/guidetobusiness/en/2/art_2_3.html
 */
class Nif implements IsoCodeInterface
{
    /**
     * NIF and DNI validation.
     *
     * @param string $nif The NIF or NIE
     *
     * @return bool
     */
    public static function validate($nif)
    {
        $nifCodes = 'TRWAGMYFPDXBNJZSQVHLCKE';

        if (9 !== strlen($nif)) {
            return false;
        }
        $nif = strtoupper(trim($nif));

        $sum = (string) self::getCifSum($nif);
        $n = 10 - substr($sum, -1);

        if (preg_match('/^[0-9]{8}[A-Z]{1}$/', $nif)) {
            // DNIs
            $num = substr($nif, 0, 8);

            return ($nif[8] == $nifCodes[$num % 23]);
        } elseif (preg_match('/^[XYZ][0-9]{7}[A-Z]{1}$/', $nif)) {
            // NIEs normales
            $tmp = substr($nif, 1, 7);
            $tmp = strtr(substr($nif, 0, 1), 'XYZ', '012').$tmp;

            return ($nif[8] == $nifCodes[$tmp % 23]);
        } elseif (preg_match('/^[KLM]{1}/', $nif)) {
            // NIFs especiales
            return ($nif[8] == chr($n + 64));
        } elseif (preg_match('/^[T]{1}[A-Z0-9]{8}$/', $nif)) {
            // NIE extraño
            return true;
        }

        return false;
    }

    /**
     * Used to calculate the sum of the CIF, DNI and NIE.
     *
     * @param string $cif
     *
     * @codeCoverageIgnore
     *
     * @return mixed
     */
    public static function getCifSum($cif)
    {
        $sum = $cif[2] + $cif[4] + $cif[6];

        for ($i = 1; $i < 8; $i += 2) {
            $tmp = (string) (2 * $cif[$i]);
            $tmp = $tmp[0] + ((strlen($tmp) == 2) ?  $tmp[1] : 0);
            $sum += $tmp;
        }

        return $sum;
    }
}
