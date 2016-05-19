<?php

namespace IsoCodes;

/**
 * Class Bsn: In the Netherlands, the citizen service number (BSN) is a unique personal number
 * allocated to everyone registered in the Municipal Personal Records Database.
 *
 * @link https://www.government.nl/topics/identification-documents/contents/the-citizen-service-number
 */
final class Bsn implements IsoCodeInterface
{
    /**
     * BSN validator.
     *
     * @param string $value
     *
     * @author  Albert Bakker <hello@abbert.nl>
     *
     * @return bool
     */
    public static function validate($value)
    {
        if (!is_numeric($value)) {
            return false;
        }

        $stringLength = strlen($value);

        if ($stringLength !== 9 && $stringLength !== 8) {
            return false;
        }

        $sum = 0;
        $multiplier = $stringLength;
        for ($counter = 0; $counter < $stringLength; $counter++, $multiplier--) {
            if ($multiplier == 1) {
                $multiplier = -1;
            }

            $sum += substr($value, $counter, 1) * $multiplier;
        }

        return $sum % 11 === 0;
    }
}
