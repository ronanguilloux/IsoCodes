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
        if ('' === trim((string) $creditCard)) {
            return false;
        }

        if (! boolval(preg_match('/.*[1-9].*/', $creditCard))) {
            return false;
        }

        $creditCard = Utils::unDecorate($creditCard, [' ', '-', '.']);
        $length = strlen($creditCard);

        return Utils::luhn($creditCard, $length, []);
    }
}
