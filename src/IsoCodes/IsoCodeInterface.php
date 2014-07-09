<?php

namespace IsoCodes;

/**
 * Interface IsoCodeInterface
 *
 * @package IsoCodes
 */
interface IsoCodeInterface
{
    /**
     * @param $value
     *
     * @return boolean
     */
    public static function validate($value);

}
