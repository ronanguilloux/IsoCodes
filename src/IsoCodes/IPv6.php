<?php

declare(strict_types=1);

namespace IsoCodes;

/**
 * IPV6 validator.
 *
 * @see http://php.net/manual/en/function.filter-var.php
 * @see https://en.wikipedia.org/wiki/IPv6
 */
class IPv6 extends IP implements IsoCodeInterface
{
    /**
     * @param string $ipv6
     *
     * @return bool
     */
    public static function validate($ipv6)
    {
        return parent::validate($ipv6, 6);
    }
}
