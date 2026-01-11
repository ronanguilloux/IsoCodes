<?php

namespace IsoCodes\Tests;

/**
 * Class EinTest.
 *
 * @covers \IsoCodes\Ein
 */
class EinTest extends AbstractIsoCodeInterfaceTest
{
    public static function getValidValues()
    {
        return [
            ['12-3456789'],
            ['123456789'],
            ['00-1234567'],
            ['99-9999999'],
        ];
    }

    public static function getInvalidValues()
    {
        return [
            ['12-345678'],   // Too short
            ['12-34567890'], // Too long
            ['12-345678A'],  // Contains letter
            ['AA-3456789'],  // Contains letters
            ['123-456789'],  // Hyphen in wrong place
            ['1-23456789'],  // Hyphen in wrong place
        ];
    }
}
