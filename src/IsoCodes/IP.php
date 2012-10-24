<?php

namespace IsoCodes;

class IP implements IsoCodeInterface
{
    /**
     * IPV4 public-only validator
     *
     * @link http://php.net/manual/fr/function.filter-var.php
     * @param  string  $ip
     * @return boolean
     */
    public static function validate($ip)
    {
        return (false != filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4));
    }

    /**
     * IPV6 validator
     *
     * @link http://php.net/manual/fr/function.filter-var.php
     * @param  string  $ip
     * @return boolean
     */
    public static function validateIPV6($ip)
    {
        return (false != filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6));

    }

}
