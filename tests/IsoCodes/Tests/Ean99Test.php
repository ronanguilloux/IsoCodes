<?php

namespace IsoCodes\Tests;

/**
 * Class Ean99Test.
 *
 * @covers \IsoCodes\Ean99
 */
class Ean99Test extends AbstractIsoCodeInterfaceTest
{
    public static function getValidValues()
    {
        return [
            ['9901234567899'],
            ['9912345678909'],
            ['990123456789-9'], // hyphens
            ['99 0123456789 9'], // spaces
        ];
    }

    public static function getInvalidValues()
    {
        return [
            ['9801234567899'], // Wrong prefix
            ['9901234567898'], // Bad checksum
            ['123'],           // Too short
            ['99012345678991'], // Too long
            ['990123456789A'], // Non-numeric
            ['0000000000000'],
        ];
    }
}
