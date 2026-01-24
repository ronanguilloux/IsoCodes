<?php

namespace IsoCodes\Tests;

use IsoCodes\Giai;

/**
 * Class GiaiTest.
 *
 * @covers \IsoCodes\Giai
 */
class GiaiTest extends AbstractIsoCodeTest
{
    public static function getValidValues()
    {
        return [
            ['20063290R'],
            ['ABC12345'],
            ['123456789012345678901234567890'], // 30 chars
            ['A'], // 1 char
            ['abc'], // Lowercase allowed (normalized)

            // Railway Asset: Prefix: 735005385 / Asset ID: 1
            ['7350053851'],

            // Aviation Component: Prefix: 0801234 / Asset ID: WIDGET99
            ['0801234WIDGET99'],

            // Long Example: Used in European Rail RFID tracking
            ['7350053852907412345676'],
        ];
    }

    public static function getInvalidValues()
    {
        return [
            [''], // Empty
            ['1234567890123456789012345678901'], // 31 chars
            ['2006-3290R'], // Hyphen not allowed
            ['A.B.C'], // Dot not allowed
        ];
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($giai)
    {
        $this->assertTrue(Giai::validate($giai));
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($giai)
    {
        $this->assertFalse(Giai::validate($giai));
    }
}
