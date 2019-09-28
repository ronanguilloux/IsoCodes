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
     * @param int $length
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
        for ($i = 0; $i < $length; ++$i) {
            $indice = ($length - $i);
            $tmp = (2 - ($indice % 2)) * $insee[$i];
            if ($tmp >= 10) {
                $tmp -= 9;
            }
            $sum += $tmp;
        }

        $res = ($sum % 10) == 0;

        if (!$res) {
            /**
             * La poste support (French mail company)
             * @link https://fr.wikipedia.org/wiki/SIRET#Calcul_et_validit%C3%A9_d'un_num%C3%A9ro_SIRET
             * @link https://blog.pagesd.info/2012/09/05/verifier-numero-siret-poste/
             */
            $laPosteSiren = '356000000';
            if (($length === 14) && strpos($insee, $laPosteSiren) === 0) {
                $res = $laPosteSiren === (string)$insee ? true : array_sum(str_split($insee)) % 5 === 0;
            }
        }

        return $res;
    }
}
