<?php

declare(strict_types=1);

namespace IsoCodes;

/**
 * IPv4 validator.
 *
 * @see http://php.net/manual/en/function.filter-var.php
 * @see https://en.wikipedia.org/wiki/IPv4
 */
class IPv4 extends IP implements IsoCodeInterface
{
    /**
     * @param string $ipv4
     *
     * @return bool
     */
    public static function validate($ipv4)
    {
        return parent::validate($ipv4, 4);
    }
}
