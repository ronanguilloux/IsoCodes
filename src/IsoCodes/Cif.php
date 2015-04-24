<?php

namespace IsoCodes;

/**
 * Class Nif.
 *
 * El Código de identificación fiscal ('CIF') ha sido hasta 2008 el nombre del sistema de identificación
 * tributaria utilizada en España para las personas jurídicas o entidades en general
 * según regula el Decreto 2423/1975, de 25 de septiembre.
 *
 * @source  https://github.com/alrik11es/spanish-utils
 *
 * @link    http://es.wikipedia.org/wiki/C%C3%B3digo_de_identificaci%C3%B3n_fiscal
 */
class Cif implements IsoCodeInterface
{
    /**
     * CIF validation.
     *
     * @param string $cif The CIF
     *
     * @return bool
     */
    public static function validate($cif)
    {
        $cifCodes = 'JABCDEFGHI';

        if (9 !== strlen($cif)) {
            return false;
        }
        $cif = strtoupper(trim($cif));
        $sum = (string) Nif::getCifSum($cif);

        $n = (10 - substr($sum, -1)) % 10;

        if (preg_match('/^[ABCDEFGHJKNPQRSUVW]{1}/', $cif)) {
            if (in_array($cif[0], array('A', 'B', 'E', 'H'))) {
                // Numerico
                return ($cif[8] == $n);
            } elseif (in_array($cif[0], array('K', 'P', 'Q', 'S'))) {
                // Letras
                return ($cif[8] == $cifCodes[$n]);
            } else {
                // Alfanumérico
                if (is_numeric($cif[8])) {
                    return ($cif[8] == $n);
                } else {
                    return ($cif[8] == $cifCodes[$n]);
                }
            }
        }

        return false;
    }
}
