<?php

namespace IsoCodes;

class SwiftBic implements IsoCodeInterface
{
    /**
     * SWIFT-BIC validator
     *
     * variant BIC Regex : ([a-zA-Z]{4}[a-zA-Z]{2}[a-zA-Z0-9]{2}([a-zA-Z0-9]{3})?)
     *
     * @author ronan.guilloux
     * @link http://networking.mydesigntool.com/viewtopic.php?tid=301&id=31
     * @param  string  $swiftbic
     * @return boolean
     */
    public static function validate( $swiftbic )
    {
        $regexp = "/^([a-zA-Z]){4}([a-zA-Z]){2}([0-9a-zA-Z]){2}([0-9a-zA-Z]{3})?$/";

        return (boolean) preg_match( $regexp, $swiftbic );
    }
}
