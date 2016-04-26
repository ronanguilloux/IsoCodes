<?php

namespace IsoCodes;

/**
 * Class Mac.
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class Mac implements IsoCodeInterface
{
    /**
     * MAC address validator.
     *
     * Could be separated by hyphens or colons.
     * Could be both lowercase or uppercase letters.
     * Mixed upper/lower cases and hyphens/colons are not allowed.
     *
     * @link http://en.wikipedia.org/wiki/MAC_address#Notational_conventions
     *
     * @param string $mac
     *
     * @return bool
     */
    public static function validate($mac)
    {
        $pattern = '/^(([a-f0-9]{2}-){5}[a-f0-9]{2}|([A-F0-9]{2}-){5}[A-Z0-9]{2}|([a-f0-9]{2}:){5}[a-z0-9]{2}|([A-F0-9]{2}:){5}[A-Z0-9]{2})$/';

        return boolval(preg_match($pattern, $mac));
    }
}
