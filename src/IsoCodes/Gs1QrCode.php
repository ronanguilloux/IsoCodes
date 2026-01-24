<?php

namespace IsoCodes;

/**
 * Class Gs1QrCode
 *
 * GS1 QR Code
 *
 * GS1 QR Code is a 2D matrix barcode that can hold large amounts of data.
 * It uses the same GS1 Application Identifier standards as GS1-128.
 * Maximum capacity is 4296 numeric-alphanumeric characters.
 */
class Gs1QrCode extends Gs1128
{
    /**
     * @param string $gs1String
     *
     * @return bool
     */
    public static function validate($gs1String)
    {
        // GS1 QR Code capacity is up to 4296 chars.
        // We set a safe high limit.
        return parent::validateGs1String((string) $gs1String, 4296);
    }
}
