<?php

namespace IsoCodes;

class IP implements IsoCodeInterface
{
    /**
     * IPV4 public-only validator
     *
     * @link http://php.net/manual/fr/function.filter-var.php
     * @param  string  $ipv4
     * @return boolean
     */
    public static function validate($ipv4)
    {
        return (false != filter_var($ipv4, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4));
    }

    /**
     * IPV6 validator
     *
     * @link http://php.net/manual/fr/function.filter-var.php
     * @param  string  $ipv6
     * @return boolean
     */
    public static function validateIPV6($ipv6)
    {
        return (false != filter_var($ipv6, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6));

    }

}
