<?php

namespace IsoCodes;

class Siret implements IsoCodeInterface
{
    /**
     * SIRET validator
     *
     * @author ronan.guilloux
     * @link http://fr.wikipedia.org/wiki/SIRET
     * @param  string  $siret
     * @return boolean
     */
    public static function validate( $siret )
    {
        if (strlen($siret) != 14) return false;
        if (!is_numeric($siret)) return false;
        $len = strlen($siret);
        $sum = 0;
        for ($i = 0; $i < $len; $i++) {
            $indice = ($len - $i);
            $tmp = (2 - ($indice%2)) * $siret[$i];
            if ($tmp >= 10) {
                $tmp -= 9;
            }
            $sum += $tmp;
        }

        return (($sum%10) == 0);
    }
}
