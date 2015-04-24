<?php

namespace IsoCodes;

/**
 * Class CreditCard.
 */
class CreditCard implements IsoCodeInterface
{
    /**
     * Credit Card validator.
     *
     * @param string $creditCard
     *
     * @author ronan.guilloux
     *
     * @link   http://www.prometee-creation.com/tutoriels/fonction-de-luhn-en-php.html
     *
     * @return bool
     */
    public static function validate($creditCard)
    {
        if (trim($creditCard) === '') {
            return false;
        }

        //longueur de la chaine $creditCard
        $length = strlen($creditCard);

        //resultat de l'addition de tous les chiffres
        $tot = 0;
        for ($i = $length - 1; $i >= 0; $i--) {
            $digit = substr($creditCard, $i, 1);

            if ((($length - $i) % 2) == 0) {
                $digit = $digit * 2;
                if ($digit > 9) {
                    $digit = $digit - 9;
                }
            }
            $tot += (int) $digit;
        }

        return (($tot % 10) == 0);
    }
}
