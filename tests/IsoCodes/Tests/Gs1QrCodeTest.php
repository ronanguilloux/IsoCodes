<?php

namespace IsoCodes\Tests;

use IsoCodes\Gs1QrCode;

/**
 * Class Gs1QrCodeTest.
 *
 * @covers \IsoCodes\Gs1QrCode
 */
class Gs1QrCodeTest extends AbstractIsoCodeTest
{
    public static function getValidValues()
    {
        return [
            // Standard GS1 strings (same as GS1-128)
            ['(01)01234567890128(15)251231'],
            ['(00)376123450000000016'],

            // Raw
            ['010123456789012815251231'],

            // 2D Code URL style (often seen in QR)?
            // GS1 Digital Link is a URI, but GS1 QR Code usually encodes Element Strings directly
            // or follows the URI syntax. The validator checks element string format.
            // If the user passes the raw element string decoded from the QR:
            ['(01)09501101020917'],
        ];
    }

    public static function getInvalidValues()
    {
        return [
            [''],
            ['(01)123'], // Too short
            ['(10)00000'], // Zero check inherited
        ];
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($gs1String)
    {
        $this->assertTrue(Gs1QrCode::validate($gs1String));
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($gs1String)
    {
        $this->assertFalse(Gs1QrCode::validate($gs1String));
    }
}
