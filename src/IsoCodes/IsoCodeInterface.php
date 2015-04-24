<?php

namespace IsoCodes;

/**
 * Interface IsoCodeInterface.
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
