<?php

namespace IsoCodes;

/**
 * Class SwiftBic.
 */
class SwiftBic implements IsoCodeInterface
{
    /**
     * SWIFT-BIC validator.
     *
     * @param string $swiftbic
     *
     * @author ronan.guilloux
     *
     * @see   https://www.iso20022.org
     *
     * @return bool
     */
    public static function validate($swiftbic)
    {
        $regexp = '/^[A-Z]{6,6}[A-Z2-9][A-NP-Z0-9]([A-Z0-9]{3,3}){0,1}$/i';

        return (bool) preg_match($regexp, $swiftbic);
    }
}
