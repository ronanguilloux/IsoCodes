<?php

namespace IsoCodes\Tests;

use IsoCodes\Mac;

/**
 * Class MacTest.
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class MacTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public function getValidMacAddresses()
    {
        return [
            ['01-2d-4c-ef-89-ab'],
            ['01-2D-4C-EF-89-AB'],
            ['01:2d:4c:ef:89:ab'],
            ['01:2D:4C:EF:89:AB'],
            ['01-2d-4c-ef-89-59'],
            ['ff-2d-4c-ef-89-59'],
        ];
    }

    /**
     * @return array
     */
    public function getInvalidMacAddresses()
    {
        return [
            [''],
            [' '],
            [null],
            [999999999],
            [9999.9999],
            ['01-2d-4c-ef-89-ab-06'],   // Only 6 groups of digits
            ['01-2d:4c-ef:89-ab'],      // Mixed separators are not allowed
            ['01-2d-4c-EF-89-ab'],      // Mixed cases are not allowed
            ['01-2d-4C-ef-89-ab'],      // Mixed cases are not allowed
            ['01-2dc-4c-ef-89-ab'],     // Only 2 digits per group
        ];
    }

    /**
     * @dataProvider getValidMacAddresses
     *
     * @param string $mac
     */
    public function testValidMacAddress($mac)
    {
        $this->assertTrue(Mac::validate($mac));
    }

    /**
     * @dataProvider getInvalidMacAddresses
     *
     * @param string $mac
     */
    public function testInvalidMacAddress($mac)
    {
        $this->assertFalse(Mac::validate($mac));
    }
}
