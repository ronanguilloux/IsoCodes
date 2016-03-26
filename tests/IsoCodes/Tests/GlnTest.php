<?php

namespace IsoCodes\Tests;

use IsoCodes\Gln;

/**
 * GlnTest
 *
 * @covers Isocodes\Gln
 */
class GlnTest extends \PHPUnit_Framework_TestCase
{
    /**
     * getValidGln: data provider
     *
     * @return array
     */
    public function getValidGln()
    {
        return array(
            array('0614141000012'),     // Checked using http://www.gs1.org/check-digit-calculator
            array('0614141000029'),     // Checked using http://www.gs1.org/check-digit-calculator
            array('0614141000036'),     // Checked using http://www.gs1.org/check-digit-calculator
            array('0614141 00002 9'),   // hyphens are OK (space)
            array('0614141-00003-6'),   // hyphens are OK (dash)
        );
    }

    /**
     * getInvalidGln: data provider
     *
     * @return array
     */
    public function getInvalidGln()
    {
        return array(
            array(061414100001),        // not 13 chars found
            array('061414100001'),      // not 13 chars found
            array('A614141000016'),     // not numeric-only
            array('0614141000015'),     // bad checksum digit
            array('0614141.00001.6'),   // dot hyphens are not OK.
            array(''),
            array(' ')
        );
    }

    /**
     * testValidGln
     *
     * @param mixed $gln
     *
     * @dataProvider getValidGln
     *
     * @return void
     */
    public function testValidGln($gln)
    {
        $this->assertTrue(Gln::validate($gln));
    }

    /**
     * testInvalidGln
     *
     * @param mixed $gln
     *
     * @dataProvider getInvalidGln
     *
     * @return void
     */
    public function testInvalidGln($gln)
    {
        $this->assertFalse(Gln::validate($gln));
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
