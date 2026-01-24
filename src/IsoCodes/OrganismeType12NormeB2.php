<?php

namespace IsoCodes;

/**
 * Class OrganismeType12NormeB2.
 */
class OrganismeType12NormeB2 implements IsoCodeInterface
{
    /**
     * validate 1-2 type keys, based on Social Scurity B2 Norm
     * French & Belgian "Clef type 1-2 Norme B2 Securité Sociale".
     *
     * @param string $code
     * @param int    $key
     *
     * @return bool
     */
    public static function validate($code = '', $key = -1)
    {
        if (strlen((string) $key) < 1) {
            return false;
        }

        if (! is_numeric($key)) {
            return false;
        }

        if (! is_string($code)) {
            return false;
        }

        if (strlen($code) < 2) {
            return false;
        }

        $value = $code.$key;

        return Utils::luhn($value, strlen($value), []);
    }
}
