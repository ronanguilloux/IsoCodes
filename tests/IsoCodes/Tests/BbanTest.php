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
            array('15459450000411700920U62'),
            array('10207000260402601177083')
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
            array(10207000260402601177083),
            array('15459 45000 0411700920U 62'),
            array('10207000260402601177084'),
            array(10207000260402601177084),
            array(''),
            array(' '),
            array(null)
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

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
