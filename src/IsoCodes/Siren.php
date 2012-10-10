<?php

namespace IsoCodes;

class Siren
{
    /**
     * SIREN validator
     *
     * @author ronan.guilloux
     * @link http://fr.wikipedia.org/wiki/SIREN
     * @param string $siren
     * @return boolean
     */
    public static function validate( $siren )
    {
        if (strlen($siren) != 9) return false;
        if (!is_numeric($siren)) return false;
        $len = strlen($siren);
        $sum = 0;
        for($i = 0; $i < $len; $i++)
        {
            $indice = ($len - $i);
            $tmp = (2 - ($indice%2)) * $siren[$i];
            if($tmp >= 10)
            {
                $tmp -= 9;
            }
            $sum += $tmp;
        }
        return (($sum%10) == 0);
    }
}
?>
