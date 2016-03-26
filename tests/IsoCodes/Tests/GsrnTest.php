<?php

namespace IsoCodes\Tests;

use IsoCodes\Gsrn;

/**
 * GsrnTest
 *
 * @covers Isocodes\Gsrn
 */
class GsrnTest extends \PHPUnit_Framework_TestCase
{
    /**
     * getValidGsrn: data provider
     *
     * @return array
     */
    public function getValidGsrn()
    {
        return [
            ['735005385000000011'],
            ['735005385 00000001 1'],
            ['735005385-00000001-1']
        ];
    }

    /**
     * getInvalidGsrn: data provider
     *
     * @return array
     */
    public function getInvalidGsrn()
    {
        return array(
            array('73500538500000001'),     // not 18 chars found
            array(73500538500000001),       // same, but integer
            array('735005385-000000001-1'), // too long
            array('735005385-A0000001-1'),  // not numeric-only
            array('735005385-00000001-2'),  // bad checksum digit
            array('735005385-00000001.1'),  // dot hyphens are not OK.
            array(''),
            array(' ')
        );
    }

    /**
     * testValidGsrn
     *
     * @param mixed $gsrn
     *
     * @dataProvider getValidGsrn
     *
     * @return void
     */
    public function testValidGsrn($gsrn)
    {
        $this->assertTrue(Gsrn::validate($gsrn));
    }

    /**
     * testInvalidGsrn
     *
     * @param mixed $gsrn
     *
     * @dataProvider getInvalidGsrn
     *
     * @return void
     */
    public function testInvalidGsrn($gsrn)
    {
        $this->assertFalse(Gsrn::validate($gsrn));
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
