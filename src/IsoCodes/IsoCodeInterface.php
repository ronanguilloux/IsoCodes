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
     * @param $value
     *
     * @return bool
     */
    public static function validate($value);
}
