<?php

namespace IsoCodes;

/**
 * In the Netherlands, the citizen service number (BSN) is a unique personal number
 * allocated to everyone registered in the Municipal Personal Records Database.
 *
 * @link https://www.government.nl/topics/identification-documents/contents/the-citizen-service-number
 * @link https://nl.wikipedia.org/wiki/Elfproef (dutch)
 * @link https://nl.wikipedia.org/wiki/Burgerservicenummer (dutch)
 * @link http://datavaluetalk.com/data-quality/remarkable-facts-on-dutch-national-personal-identification-number-burgerservicenummer-bsn/
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
