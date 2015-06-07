<?php

namespace IsoCodes;

/**
 * Class Isbn10.
 *
 * @deprecated since 1.2, to be removed in 2.0.
 */
class Isbn10 implements IsoCodeInterface
{
    /**
     * @param mixed $isbn10
     *
     * @return bool
     */
    public static function validate($isbn10)
    {
        trigger_error('Isbn10::validate validator is deprecated since 1.2 and will be removed in 2.0. Use Isbn::validate($value, 10) instead.', E_USER_DEPRECATED);

        return Isbn::validate($isbn10, 10);
    }
}
