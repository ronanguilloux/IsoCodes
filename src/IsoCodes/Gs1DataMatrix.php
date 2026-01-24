<?php

namespace IsoCodes;

/**
 * Class Gs1DataMatrix.
 *
 * GS1 DataMatrix
 *
 * GS1 DataMatrix is a 2D matrix barcode that can hold large amounts of data.
 * It uses the same GS1 Application Identifier standards as GS1-128,
 * but with a much higher character capacity (up to 2335 alphanumerics).
 */
class Gs1DataMatrix extends Gs1128
{
    /**
     * @param string $gs1String
     *
     * @return bool
     */
    public static function validate($gs1String)
    {
        // GS1 DataMatrix can hold up to 2335 numeric or 3116 numeric-only characters.
        // We set a safe high limit.
        return parent::validateGs1String((string) $gs1String, 2335);
    }
}
