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
     * @return bool
     */
    public static function validate($creditCard)
    {
        $creditCard = $creditCard ?? '';

        if ('' === trim($creditCard)) {
            return false;
        }

        if (!boolval(preg_match('/.*[1-9].*/', $creditCard))) {
            return false;
        }

        //longueur de la chaine $creditCard
        $length = strlen($creditCard);

        //resultat de l'addition de tous les chiffres
        $tot = 0;
        for ($i = $length - 1; $i >= 0; --$i) {
            $digit = substr($creditCard, $i, 1);

            if ((($length - $i) % 2) == 0) {
                $digit = (int) $digit * 2;
                if ($digit > 9) {
                    $digit = $digit - 9;
                }
            }
            $tot += (int) $digit;
        }

        return ($tot % 10) == 0;
    }
}
