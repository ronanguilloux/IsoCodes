<?php

namespace IsoCodes;

/**
 * Class Isan.
 *
 * International Standard Audiovisual Number (ISAN)
 * ISO 15706
 *
 * An ISAN uniquely identifies an audiovisual work and related versions.
 *
 * Format:
 * RRRR-RRRR-RRRR-EEEE-X-VVVV-VVVV-Y
 *
 * R: Root (12 hex digits)
 * E: Episode (4 hex digits)
 * X: Check digit 1 (alphanumeric Mod 37,36 on first 16 chars)
 * V: Version (8 hex digits)
 * Y: Check digit 2 (alphanumeric Mod 37,36 on 24 chars: Root+Episode+Version)
 */
class Isan implements IsoCodeInterface
{
    /**
     * @param string $isan
     *
     * @return bool
     */
    public static function validate($isan, $options = [])
    {
        $isan = (string) $isan;
        $isan = strtoupper($isan);

        // Remove ISAN prefix
        if (0 === strpos($isan, 'ISAN')) {
            $isan = substr($isan, 4);
        }

        // Remove delimiters
        $isan = str_replace(['-', ' '], '', $isan);

        $length = strlen($isan);

        // Core ISAN (16 hex + 1 check) = 17 chars
        // Full ISAN (16 hex + 1 check + 8 hex + 1 check) = 26 chars
        if (! in_array($length, [17, 26], true)) {
            return false;
        }

        // Validate characters (Hex + check digits which are alphanumeric)
        // Check digits can be 0-9 or A-Z. Hex is 0-9, A-F.
        // So overall alphanumeric is safe.
        if (! ctype_alnum($isan)) {
            return false;
        }

        // Structure: 16 Hex | Check1 | 8 Hex | Check2
        $core = substr($isan, 0, 16);
        $check1 = $isan[16];

        // 1. Validate Core must be Hex
        if (! ctype_xdigit($core)) {
            return false;
        }

        // 2. Validate Check1
        if (Utils::iso7064Mod37_36($core) !== $check1) {
            return false;
        }

        // If only Core ISAN, we are done
        if (17 === $length) {
            return true;
        }

        // 3. Full ISAN validation
        $version = substr($isan, 17, 8);
        $check2 = $isan[25];

        // Validate Version must be Hex
        if (! ctype_xdigit($version)) {
            return false;
        }

        // Calculate Check2
        // Input is concatenation of Core (16 hex) and Version (8 hex)
        // Check1 is NOT included
        $fullInput = $core.$version;

        if (Utils::iso7064Mod37_36($fullInput) !== $check2) {
            return false;
        }

        return true;
    }
}
