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
     * SIRET validator
     *
     * @author ronan.guilloux
     * @link http://fr.wikipedia.org/wiki/SIRET
     * @param  string  $insee
     * @return boolean
     */
    public static function validate( $insee, $length=14)
    {
        return parent::validate($insee,$length);
    }
}
