<?php

namespace IsoCodes;

/**
 * Siren
 * En France, le SIREN (Système d’Identification du Répertoire des Entreprises)
 * est un code Insee unique qui sert à identifier une entreprise française.
 * Il existe au sein d'un répertoire géré par l'Insee : SIRENE.
 */
class Siren implements IsoCodeInterface
{
    /**
     * SIREN validator.
     *
     * @param string $insee
     * @param int    $length
     *
     * @author ronan.guilloux
     *
     * @link   http://fr.wikipedia.org/wiki/SIREN
     *
     * @return bool
     */
    public static function validate($insee, $length = 9)
    {
        if (!is_numeric($insee)) {
            return false;
        }

        if (strlen($insee) != $length) {
            return false;
        }

        $sum = 0;
        for ($i = 0; $i < $length; $i++) {
            $indice = ($length - $i);
            $tmp    = (2 - ($indice % 2)) * $insee[$i];
            if ($tmp >= 10) {
                $tmp -= 9;
            }
            $sum += $tmp;
        }

        return (($sum % 10) == 0);
    }
}
