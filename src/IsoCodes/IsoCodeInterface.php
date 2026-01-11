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
     * @return bool
     */
    public static function validate($value);
}
