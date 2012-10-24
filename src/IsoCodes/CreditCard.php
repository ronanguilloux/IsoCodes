<?php

namespace IsoCodes;

class CreditCard implements IsoCodeInterface
{
    /**
     * Credit Card validator
     *
     * @author ronan.guilloux
     * @link http://www.prometee-creation.com/tutoriels/fonction-de-luhn-en-php.html
     * @param  string  $creditcard
     * @return boolean
     */
    public static function validate( $creditcard )
    {

        if ( trim( $creditcard ) === '' ) {
            return false;
        }

        //longueur de la chaine $creditcard
        $length = strlen($creditcard);

        //resultat de l'addition de tous les chiffres
        $tot = 0;
        for ($i=$length-1;$i>=0;$i--) {
            $digit = substr($creditcard, $i, 1);

            if ((($length - $i) % 2) == 0) {
                $digit = $digit*2;
                if ($digit>9) {
                    $digit = $digit-9;
                }
            }
            $tot += $digit;
        }

        return (($tot % 10) == 0);
    }
}
