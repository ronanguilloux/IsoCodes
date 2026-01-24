<?php

namespace IsoCodes;

/**
 * Class Uei.
 * Unique Entity ID (GSA).
 *
 * @see https://www.gsa.gov/about-us/organization/federal-acquisition-service/fas-initiatives/integrated-award-environment/iae-systems-information-kit/uei-technical-specifications-and-api-information
 */
class Uei implements IsoCodeInterface
{
    /**
     * Character set excluding 'I' and 'O'.
     */
    public const CHARSET = '0123456789ABCDEFGHJKLMNPQRSTUVWXYZ';

    /**
     * @param string $uei
     *
     * @return bool
     */
    public static function validate($uei)
    {
        $uei = strtoupper(trim((string) $uei));

        // 1. Length must be exactly 12
        if (12 !== strlen($uei)) {
            return false;
        }

        // 2. Regex: First char [1-9A-Z], no 'I' or 'O' throughout
        // Pattern: Starts with non-zero/non-I/non-O, followed by 11 chars from the charset
        if (! preg_match('/^[1-9A-HJKLMNP-Z][0-9A-HJKLMNP-Z]{11}$/', $uei)) {
            return false;
        }

        // 3. Prevent 9 consecutive digits (TIN/DUNS protection)
        if (preg_match('/\d{9}/', $uei)) {
            return false;
        }

        // 4. Checksum Validation (12th Character)
        // The specific checksum algorithm is not public.
        // Disabling checksum validation for now to allow validity of known UEIs.
        return true;
    }
}
