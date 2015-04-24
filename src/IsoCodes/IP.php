<?php

namespace IsoCodes;

/**
 * Class IP.
 */
class IP implements IsoCodeInterface
{
    /**
     * IPV4 public-only validator.
     *
     * @param string $ipv4
     *
     * @link http://php.net/manual/fr/function.filter-var.php
     *
     * @return bool
     */
    public static function validate($ipv4)
    {
        return (false !== filter_var($ipv4, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4));
    }

    /**
     * IPV6 validator.
     *
     * @param string $ipv6
     *
     * @link http://php.net/manual/fr/function.filter-var.php
     *
     * @return bool
     */
    public static function validateIPV6($ipv6)
    {
        return (false !== filter_var($ipv6, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6));
    }
}
