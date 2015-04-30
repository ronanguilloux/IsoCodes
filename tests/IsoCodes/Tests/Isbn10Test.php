<?php

namespace IsoCodes\Tests;

use IsoCodes\Isbn10;

/**
 * Isbn10Test
 *
 * @covers Isocodes\Isbn10
 */
class Isbn10Test extends \PHPUnit_Framework_TestCase
{
    /**
     * getValidIsbn10: data provider
     *
     * @return array
     */
    public function getValidIsbn10()
    {
        return [
            ['8881837188'],
            ['2266111566'],
            ['2123456802'],
            ['888 18 3 7 1-88'],
            ['2-7605-1028-X']
        ];
    }

    /**
     * getInvalidIsbn10: data provider
     *
     * @return array
     */
    public function getInvalidIsbn10()
    {
        return [
            ['8881837187'],
            ['888183718A'],
            ['stringof10'],
            [888183718],       // not a string
            [88818371880],     // not 10 chars found
            ['88818371880'],   // not 10 chars found
            ['8881837188A'],   // not numeric-only
            ['8881837189'],    // bad checksum digit
            [''],
            [' '],
            [null]
        ];
    }

    /**
     * testValidIsbn10
     *
     * @param mixed $isbn10
     *
     * @dataProvider getValidIsbn10
     *
     * @return void
     */
    public function testValidIsbn10($isbn10)
    {
        $this->assertTrue(Isbn10::validate($isbn10));
    }

    /**
     * testInvalidIsbn10
     *
     * @param mixed $isbn10
     *
     * @dataProvider getInvalidIsbn10
     *
     * @return void
     */
    public function testInvalidIsbn10($isbn10)
    {
        $this->assertFalse(Isbn10::validate($isbn10));
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
