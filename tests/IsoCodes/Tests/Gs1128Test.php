<?php

namespace IsoCodes\Tests;

use IsoCodes\Gs1128;

/**
 * Class Gs1128Test.
 *
 * @covers \IsoCodes\Gs1128
 */
class Gs1128Test extends AbstractIsoCodeTest
{
    public static function getValidValues()
    {
        return [
            // Human Readable
            ['(01)01234567890128(15)251231'], // GTIN + Best Before (YYMMDD = 251231, 2025-12-31)
            ['(00)001234560000000018'], // SSCC
            ['(10)BATCH123(17)220101'], // Batch + Expiry
            ['(01)90012345678908(37)100'], // GTIN + Count (Variable)

            // Raw
            ['010123456789012815251231'], // Same as first human readable
            ['00001234560000000018'],
            ['019001234567890837100'], // Variable length at end

            // More complex
            ['(02)00123456789012(15)200101(37)1200'], // GTIN contained + Best Before + Count
            ['(21)SERIALNUMBER1'], // Serial

            // 1. The "Global Shipping Standard" (SSCC)
            ['(00)376123450000000016'], // Corrected Check digit 6 (was 8)

            // 2. The "Fresh Food Traceability" String
            ['(01)01234567890128(15)261231(10)ABC-123'],

            // 3. The "Medical Device" (UDI) Standard
            ['(01)00801234567891(17)280531(21)SER12345'], // Corrected Check digit 1 (was 7)

            // 4. Amazon's "FBA" Pallet Label
            ['(420)20906(92)6129999123456712345678'],

            // 5. Purchase Order (AI 400)
            ['(400)ORDER12345'],
        ];
    }

    public static function getInvalidValues()
    {
        return [
            [''],
            ['(99)123'], // Unknown AI
            ['(01)123'], // Too short for AI 01
            ['01123'],   // Too short raw
            ['(01)01234567890128(15)251332'], // Month 13
            ['(01)01234567890128(15)250230'], // Feb 30 invalid
            ['(00)001234560000000019'], // Bad SSCC checksum (Valid is 8)
            ['(01)01234567890123'],     // Bad GTIN checksum
            [str_repeat('1', 50)],      // Too long (>48)
            ['(10)TOO_LONG_FOR_BATCH_NUMBER_OVER_20_CHARS_XXXX'], // >20 for AI 10
            ['(10)000000'], // Batch cannot be all zeros
            ['(21)000'],    // Serial cannot be all zeros
            ['(400)000'],   // PO cannot be all zeros
        ];
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($gs1128)
    {
        $this->assertTrue(Gs1128::validate($gs1128));
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($gs1128)
    {
        $this->assertFalse(Gs1128::validate($gs1128));
    }

    public function testMaxLengthOption()
    {
        $validString = '(01)01234567890128'; // Length 18 (+4 parens) = 22
        $this->assertTrue(Gs1128::validate($validString));

        // Restrict length to 20, should fail
        $this->assertFalse(Gs1128::validate($validString, ['max_length' => 15]));
    }
}
