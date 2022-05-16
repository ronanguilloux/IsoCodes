<?php

namespace IsoCodes;

/**
 * Class VisNA, validating VIN numbers in North America.
 *
 * A vehicle identification number (VIN) (also called a chassis number or frame number) is a unique code,
 * including a serial number, used by the automotive industry to identify
 * individual motor vehicles, towed vehicles, motorcycles, scooters and mopeds,
 * as defined in ISO 3779 (content and structure) and ISO 4030 (location and attachment).
 *
 * @source  https://en.wikipedia.org/wiki/Vehicle_identification_number#North_American_check_digits
 */
class VinNA implements IsoCodeInterface
{
    /**
     * VIN validation.
     *
     * @param mixed $vin
     *
     * @return bool
     */
    public static function validate($vin)
    {
        $vin = strtolower($vin);
        if (!preg_match('/^[^\Wioq]{17}$/', $vin)) {
            return false;
        }

        $weights = [8, 7, 6, 5, 4, 3, 2, 10, 0, 9, 8, 7, 6, 5, 4, 3, 2];

        $letterVal = [
            'a' => 1, 'b' => 2, 'c' => 3, 'd' => 4,
            'e' => 5, 'f' => 6, 'g' => 7, 'h' => 8,
            'j' => 1, 'k' => 2, 'l' => 3, 'm' => 4,
            'n' => 5, 'p' => 7, 'r' => 9, 's' => 2,
            't' => 3, 'u' => 4, 'v' => 5, 'w' => 6,
            'x' => 7, 'y' => 8, 'z' => 9,
        ];

        $sum = 0;
        $len = strlen($vin);
        for ($i = 0; $i < $len; ++$i) {
            if (!is_numeric($vin[$i])) {
                $sum += $letterVal[$vin[$i]] * $weights[$i];
            } else {
                $sum += $vin[$i] * $weights[$i];
            }
        }

        $check = $sum % 11;
        if (10 == $check) {
            $check = 'x';
        }

        return $check == $vin[8];
    }
}
