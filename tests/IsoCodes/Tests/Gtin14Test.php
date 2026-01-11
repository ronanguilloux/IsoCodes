<?php

namespace IsoCodes\Tests;

/**
 * Class Gtin14Test.
 *
 * @covers \IsoCodes\Gtin14
 */
class Gtin14Test extends AbstractIsoCodeInterfaceTest
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
            [00000000000000],       // zeros only
            ['00000000000000'],     // string containing all zeros
            [12345678901232],       // bad checksum digit
            [1234567890123],        // not 13 chars found
            ['1234567890123'],      // not 13 chars found
            ['A1234567890123'],     // not numeric-only
            ['12345.67890.1231'],   // dot hyphens are not OK.
        ];
    }
}
