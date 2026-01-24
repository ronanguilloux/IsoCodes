<?php

namespace IsoCodes\Tests;

use IsoCodes\Pzn;

/**
 * Class PznTest.
 *
 * @covers \IsoCodes\Pzn
 */
class PznTest extends AbstractIsoCodeInterfaceTest
{
    public static function getValidValues()
    {
        return [
            ['27580899'],
            ['06706155'], // Aspirin Protect 100 mg
            ['00040548'], // Ibuprofen Heumann Schmerztabletten 400 mg
            ['PZN 27580899'],
            ['pzn 06706155'],
            ['PZN-00040548'],
            ['PZN-0670-615-5'],
        ];
    }

    public static function getInvalidValues()
    {
        return [
            ['27580890'],       // bad checksum
            ['06706156'],       // bad checksum
            ['1234567'],        // Too short (7 digits, old PZN)
            ['123456789'],      // Too long
            ['ABC'],            // Non-numeric
            ['PZN 2758089A'],   // Non-numeric
            ['00000000'],       // 0000000 checksum is 0, valid?
            ['10000000'], // Sum = 1*1 + 0... = 1. Mod 11 = 1. Check digit 0. Invalid.
        ];
    }
}
