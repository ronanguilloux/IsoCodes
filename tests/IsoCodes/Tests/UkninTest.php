<?php

namespace IsoCodes\Tests;

use IsoCodes\Uknin;

/**
 * UkninTest
 *
 * @covers IsoCodes\Uknin
 */
class UkninTest extends \PHPUnit_Framework_TestCase
{
    /**
     * getValidUknin: data Provider
     *
     * @return array
     */
    public function getValidUknin()
    {
        return array(
            array('AB123456C'),
            array('EH123456A'),
            array('HG123456B')
        );
    }

    /**
     * getInvalidUknin: data Provider
     *
     * @return array
     */
    public function getInvalidUknin()
    {
        return array(
            array('AD123456CA'),
            array('AD12345C'),
            array('AD123456'),
            array('AF123456C'),
            array('AB123456F'),
            array('TN011258F'),
            array(''),
            array(' '),
            array(null),
            array('azertyuiop')
        );
    }

    /**
     * testValidUknin
     *
     * @param mixed $uknin
     *
     * @dataProvider getValidUknin
     *
     * return void
     */
    public function testValidUknin($uknin)
    {
        $this->assertTrue(Uknin::validate($uknin));
    }

    /**
     * testInvalidUknin
     *
     * @param mixed $uknin
     *
     * @dataProvider getInvalidUknin
     *
     * return void
     */
    public function testInvalidUknin($uknin)
    {
        $this->assertFalse(Uknin::validate($uknin));
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
