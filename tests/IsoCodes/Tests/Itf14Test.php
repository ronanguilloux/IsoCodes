<?php

namespace IsoCodes\Tests;

/**
 * Class Itf14Test.
 *
 * @covers \IsoCodes\Itf14
 */
class Itf14Test extends AbstractIsoCodeInterfaceTest
{
    public static function getValidValues()
    {
        return [
            ['12345678901231'],
            ['00012345600012'], // http://www.gtin.info/
        ];
    }

    public static function getInvalidValues()
    {
        return [
            ['00000000000000'],     // string containing all zeros
            ['12345678901232'],     // bad checksum digit
            ['1234567890123'],      // not 14 chars found
            ['A1234567890123'],     // not numeric-only
            ['12345.67890.1231'],   // dot hyphens are not OK.
        ];
    }
}
