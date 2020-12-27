<?php

namespace IsoCodes;

/**
 * Siret
 * En France, le SIRET (Système d’Identification du Répertoire des ETablissements) est un code Insee.
 * Il s'agit d'un identifiant géographique d'un établissement ou d'une entreprise.
 */
class Siret extends Siren implements IsoCodeInterface
{
    /**
     * SIRET validator.
     *
     * @param string $insee
     * @param int    $length
     *
     * @author ronan.guilloux
     *
     * @see   http://fr.wikipedia.org/wiki/SIRET
     * @see   https://fr.wikipedia.org/wiki/SIRET#Calcul_et_validit%C3%A9_d'un_num%C3%A9ro_SIRET
     *
     * @return bool
     */
    public static function validate($insee, $length = 14)
    {
        return parent::validate($insee, $length);
    }
}
