<?php

namespace IsoCodes;

/**
 * In the Netherlands, the citizen service number (BSN) is a unique personal number
 * allocated to everyone registered in the Municipal Personal Records Database.
 *
 * @see https://www.government.nl/topics/identification-documents/contents/the-citizen-service-number
 * @see https://nl.wikipedia.org/wiki/Elfproef (dutch)
 * @see https://nl.wikipedia.org/wiki/Burgerservicenummer (dutch)
 * @see http://datavaluetalk.com/data-quality/remarkable-facts-on-dutch-national-personal-identification-number-burgerservicenummer-bsn/
 *
 * @author  Albert Bakker <hello@abbert.nl>
 */
final class Bsn implements IsoCodeInterface
{
    /**
     * @param string $value
     *
     * @return bool
     */
    public static function validate($value)
    {
        if (!is_numeric($value)) {
            return false;
        }

        $stringLength = strlen($value);

        if (9 !== $stringLength && 8 !== $stringLength) {
            return false;
        }

        $sum = 0;
        $multiplier = $stringLength;
        for ($counter = 0; $counter < $stringLength; $counter++, $multiplier--) {
            if (1 == $multiplier) {
                $multiplier = -1;
            }

            $sum += substr($value, $counter, 1) * $multiplier;
        }

        return 0 === $sum % 11;
    }
}
