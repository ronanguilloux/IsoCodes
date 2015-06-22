<?php

namespace IsoCodes;

/**
 * Interface IsoCodeInterface.
 *
 * @codeCoverageIgnore
 */
interface IsoCodeInterface
{
    /**
     * @param mixed $value
     *
     * @return bool
     */
    public static function validate($value);
}
