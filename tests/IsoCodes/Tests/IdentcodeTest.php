<?php

namespace IsoCodes\Tests;

/**
 * Class IdentcodeTest.
 *
 * @covers \IsoCodes\Identcode
 */
class IdentcodeTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * @return array
     */
    public static function getValidValues()
    {
        return [
            ['563102430313'],
        ];
    }

    /**
     * @return array
     */
    public static function getInvalidValues()
    {
        return [
            ['563102430314'], // Bad checksum
            ['56310243031'],  // Too short
            ['5631024303133'], // Too long
            ['A63102430313'], // Non-numeric
        ];
    }
}
