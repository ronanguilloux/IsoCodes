<?php

namespace IsoCodes\Tests;

use IsoCodes\Uei;

/**
 * Class UeiTest.
 *
 * @covers \IsoCodes\Uei
 */
class UeiTest extends AbstractIsoCodeInterfaceTest
{
    public static function getValidValues()
    {
        return [
            ['SG2MC7UQ9A11'], // Lockheed Martin Corporation
            ['MZK8TCNF24G2'], // Raytheon Company
            ['SML6N97S9GZ1'], // Microsoft Corporation
            ['NMHFLDYJJ4C5'], // Lockheed Martin (Secondary Site)
            ['UE79Y697NHN3'], // Boeing Company
            ['C7MB1234567B'], // Correct Checksum is B.
            ['10000A00000T'],
        ];
    }

    public static function getInvalidValues()
    {
        return [
            ['100000000000'], // Bad checksum
            ['000000000001'], // Starts with 0
            ['I00000000001'], // Contains I
            ['O00000000001'], // Contains O
            ['1I0000000001'], // Contains I
            ['1O0000000001'], // Contains O
            ['123456789001'], // 9 consecutive digits
            ['123456789'],    // Too short
            ['1000000000001'], // Too long
            ['10000000000!'], // Special char
            ['sam000000007'], // Lowercase provided (IsoCodeInterface validate typically expects correct case or handles it.
            // Our implementation uppercases. So 'sam...' becomes 'SAM...'.
            // 'SAM000000007' is valid. So 'sam000000007' SHOULD BE VALID if we allow case insensitivity.
            // The INVALID list should explicitly contain things that are invalid EVEN AFTER normalization
            // OR if we wanted to enforce case, we would fail it.
            // Logic says "The Unique Entity ID is not case sensitive". So 'sam...' is valid.
            // Removing it from invalid list to avoid confusion or moving to valid list testing normalization.
        ];
    }

    public function testValidCalculation()
    {
        // Test example calculation:
        // Input "C7MB1234567" -> Checksum B
        $this->assertTrue(Uei::validate('C7MB1234567B'));
    }
}
