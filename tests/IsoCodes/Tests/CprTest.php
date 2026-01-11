<?php

namespace IsoCodes\Tests;

/**
 * Class CprTest.
 *
 * @covers \IsoCodes\Cpr
 */
class CprTest extends AbstractIsoCodeInterfaceTest
{
    public static function getValidValues()
    {
        return [
            ['3112991234'], // 31st Dec 1999
            ['311299-1234'],
            ['0101004000'], // 1st Jan 2000 (D7=4, YY=00 <= 36 -> 2000)
            ['2902004000'], // 29th Feb 2000 (Leap year, valid)
            ['2902960000'], // 29th Feb 1996 (Leap year, valid)
            ['1111111111'],
        ];
    }

    public static function getInvalidValues()
    {
        return [
            ['12345678'],   // Too short
            ['123456-789'], // Too short structure
            ['3201991234'], // Invalid day (32)
            ['0001991234'], // Invalid day (00)
            ['2902991234'], // 29th Feb 1999 (Not leap year, D7=1 -> 1999)

            // Let's check a non-leap year century case
            // D7=5, YY=58 -> 1858. 1858 not leap. 2000 is leap.
            // 1900 is NOT leap.
            // Invalid: 29th Feb 1900
            // D7=0, YY=00 -> 1900.
            ['2902000000'], // 29th Feb 1900 (D7=0 -> 1900, not leap)
        ];
    }
}
