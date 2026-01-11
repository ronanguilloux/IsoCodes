<?php

declare(strict_types=1);

namespace IsoCodes;

/**
 * IPv6 validator.
 */
class IPv6 implements IsoCodeInterface
{
    /**
     * IP validator.
     *
     * @param string $ip
     *
     * @see http://php.net/manual/fr/function.filter-var.php
     *
     * @return bool
     */
    public static function validate($ip)
    {
        return false !== filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
    }
}
