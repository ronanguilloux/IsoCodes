<?php

namespace IsoCodes\Tests;

/**
 * Class LeitcodeTest.
 *
 * @covers \IsoCodes\Leitcode
 */
class LeitcodeTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * @return array
     */
    public static function getValidValues()
    {
        return [
            ['23669012012305'],
        ];
    }

    /**
     * @return array
     */
    public static function getInvalidValues()
    {
        return [
            ['23669012012306'], // Bad checksum
            ['2366901201230'],  // Too short
            ['236690120123055'], // Too long
            ['A3669012012305'], // Non-numeric
        ];
    }
}
