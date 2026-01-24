<?php

namespace IsoCodes\Tests;

use IsoCodes\Issn;

class IssnTest extends AbstractIsoCodeTest
{
    public static function getValidValues()
    {
        return [
            ['0378-5955'], // Hearing Research
            ['2434-561X'], // Example with X
            ['2049-3630'], // Generated
            ['03785955'],  // Without hyphen
            ['2434561X'],  // Without hyphen
            ['2434 561X'], // With space
        ];
    }

    public static function getInvalidValues()
    {
        return [
            ['0378-5954'], // Bad checksum
            ['2434-5610'], // Bad checksum (should be X)
            ['1234-567'],  // Too short
            ['1234-56789'], // Too long
            ['0378-595A'], // Invalid char
            ['0000-000X'], // Bad checksum (X when 0 expected)
            ['abc'],       // Garbage
            [12345678],    // Integer (though Utils casts to string, usually we test strictly or semi-strictly), validation expects string usually but casting is in code.
            // The implementation does $issn = (string) $issn; so int might pass if valid.
            // But AbstractIsoCodeTest usually passes these to validate.
            // Let's stick to obvious fails.
            [''],          // Empty
        ];
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($issn)
    {
        $this->assertTrue(Issn::validate($issn));
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($issn)
    {
        $this->assertFalse(Issn::validate($issn));
    }
}
