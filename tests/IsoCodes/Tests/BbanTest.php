<?php

namespace IsoCodes\Tests;

use IsoCodes\Bban;

/**
 * BbanTest
 *
 * @covers Isocodes\Bban
 */
class BbanTest extends \PHPUnit_Framework_TestCase
{
    /**
     * getValidBbans: data Provider
     *
     * @return array
     */
    public function getValidBbans()
    {
        return array(
            array('15459450000411700920U62', true),
            array('10207000260402601177083', true)
        );
    }

    /**
     * getInvalidBbans: data Provider
     *
     * @return array
     */
    public function getInvalidBbans()
    {
        return array(
            array(10207000260402601177083, false),
            array('15459 45000 0411700920U 62', false),
            array('10207000260402601177084', false),
            array(10207000260402601177084, false),
            array('', false),
            array(' ', false),
            array(null, false)
        );
    }

    /**
     * testValidBban
     *
     * @param mixed $bban
     *
     * @dataProvider getValidBbans
     *
     * @return void
     */
    public function testValidBban($bban)
    {
        $this->assertTrue(Bban::validate($bban));
    }

    /**
     * testInvalidBban
     *
     * @param mixed $bban
     *
     * @dataProvider getInvalidBbans
     *
     * @return void
     */
    public function testInvalidBban($bban)
    {
        $this->assertFalse(Bban::validate($bban));
    }

    protected function setUp()
    {
        parent::setUp();
    }
}
