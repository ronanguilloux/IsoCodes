<?php

namespace IsoCodes;

/**
 * Class Sscc for European/International Article Number, 14 digits long code.
 *
 * @see https://en.wikipedia.org/wiki/Serial_shipping_container_code
 * @see http://www.gs1.org/serial-shipping-container-code-sscc
 * @see http://www.morovia.com/kb/Serial-Shipping-Container-Code-SSCC18-10601.html
 */
class Sscc extends Gtin implements IsoCodeInterface
{
    /**
     * @param mixed $sscc
     *
     * @return bool
     */
    public static function validate($sscc)
    {
        return parent::check($sscc, 18);
    }
}
