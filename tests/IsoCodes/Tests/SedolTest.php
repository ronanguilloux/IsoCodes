<?php

namespace IsoCodes\Tests;

use IsoCodes\Sedol;

/**
 * @covers Isocodes\Sedol
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class SedolTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public function getValidSedols()
    {
        return [
            // http://rosettacode.org/wiki/SEDOLs
            ['7108899'],
            ['B0YBKJ7'],
            ['4065663'],
            ['B0YBLH2'],
            ['2282765'],
            ['B0YBKL9'],
            ['5579107'],
            ['B0YBKR5'],
            ['5852842'],
            ['B0YBKT7'],
            ['B000300'],
            // http://formvalidation.io/validators/sedol/
            ['0263494'],
            ['B0WNLY7'],
        ];
    }

    /**
     * @return array
     */
    public function getInvalidSedols()
    {
        return [
            ['71-8894'],    // Invalid chars
            ['710889'],     // 5 chars
            ['7108899J'],   // 8 chars
            ['0263496'],    // Wrong check digit
            ['B0WNLYF'],    // Non-digit at end
            [''],
            [' '],
            [null],
        ];
    }

    /**
     * @param string $sedol
     *
     * @dataProvider getValidSedols
     */
    public function testValidSedol($sedol)
    {
        $this->assertTrue(Sedol::validate($sedol));
    }

    /**
     * @param string $sedol
     *
     * @dataProvider getInvalidSedols
     */
    public function testInvalidSedol($sedol)
    {
        $this->assertFalse(Sedol::validate($sedol));
    }
}
