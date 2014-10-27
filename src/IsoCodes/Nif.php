<?php

namespace IsoCodes;

/**
 * Class Nif
 *
 * El Número de Identificación Fiscal (NIF) es la manera de identificación tributaria
 * utilizada en España para las personas físicas (con documento nacional de identidad (DNI)
 * o número de identificación de extranjero (NIE) asignados por el Ministerio del Interior)
 * y las personas jurídicas.1 El antecedente del NIF es el CIF, utilizado en personas jurídicas.
 * El Real Decreto 338/1990, de 9 de marzo, regula la composición y la forma de uso del NIF,
 * hasta la entrada en vigor en enero de 2008 del Real Decreto 1065/2007, de 27 de julio.
 *
 * @package IsoCodes
 * @source  https://github.com/alrik11es/spanish-utils
 * @link    http://es.wikipedia.org/wiki/NIF
 */
class Nif implements IsoCodeInterface
{
    /**
    * NIF and DNI validation
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
            $tmp = strtr(substr($nif, 0, 1), 'XYZ', '012') . $tmp;

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
     * Used to calculate the sum of the CIF, DNI and NIE
     *
     * @param string $cif
     *
     * @return mixed
     */
    public static function getCifSum($cif)
    {
        $sum = $cif[2] + $cif[4] + $cif[6];

        for ($i = 1; $i<8; $i += 2) {
            $tmp = (string) (2 * $cif[$i]);
            $tmp = $tmp[0] + ((strlen($tmp) == 2) ?  $tmp[1] : 0);
            $sum += $tmp;
        }

        return $sum;
    }
}
