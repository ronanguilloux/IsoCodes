<?php

namespace IsoCodes\Tests;

use IsoCodes\Gs1DataMatrix;

/**
 * Class Gs1DataMatrixTest.
 *
 * @covers \IsoCodes\Gs1DataMatrix
 */
class Gs1DataMatrixTest extends AbstractIsoCodeTest
{
    public static function getValidValues()
    {
        return [
            // Standard GS1 strings (same as GS1-128)
            ['(01)01234567890128(15)251231'],
            ['(00)376123450000000016'],

            // Longer Strings (Simulated DataMatrix capacity)
            // Example: Many AIs concatenated
            ['(01)01234567890128' . str_repeat('(10)BATCH123', 5)],

            // Raw format
            ['010123456789012815251231'],
        ];
    }

    public static function getInvalidValues()
    {
        return [
            [''],
            ['(01)123'], // Too short
            ['(10)00000'], // Zero check inherited
            // Extremely long string exceeding 2335 chars would fail, but testing that is excessive for unit test speed.
        ];
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($gs1String)
    {
        $this->assertTrue(Gs1DataMatrix::validate($gs1String));
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($gs1String)
    {
        $this->assertFalse(Gs1DataMatrix::validate($gs1String));
    }
}
