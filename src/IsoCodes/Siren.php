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
     * SIREN validator
     *
     * @author ronan.guilloux
     * @link http://fr.wikipedia.org/wiki/SIREN
     * @param  string  $insee
     * @return boolean
     */
    public static function validate( $insee, $length=9 )
    {
        if (strlen($insee) != $length) return false;
        if (!is_numeric($insee)) return false;
        $len = strlen($insee);
        $sum = 0;
        for ($i = 0; $i < $len; $i++) {
            $indice = ($len - $i);
            $tmp = (2 - ($indice%2)) * $insee[$i];
            if ($tmp >= 10) {
                $tmp -= 9;
            }
            $sum += $tmp;
        }

        return (($sum%10) == 0);
    }
}
