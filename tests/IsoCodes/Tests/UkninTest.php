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
        return [
            ['AB123456C'],
            ['EH123456A'],
            ['HG123456B']
        ];
    }

    /**
     * getInvalidUknin: data Provider
     *
     * @return array
     */
    public function getInvalidUknin()
    {
        return [
            ['AD123456CA'],
            ['AD12345C'],
            ['AD123456'],
            ['AF123456C'],
            ['AB123456F'],
            ['TN011258F'],
            [''],
            [' '],
            [null],
            ['azertyuiop']
        ];
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
