<?php

namespace IsoCodes\Tests;

use IsoCodes\Isbn10;

/**
 * Isbn10Test
 *
 * @covers Isocodes\Isbn10
 * @deprecated since 1.2, to be removed in 2.0.
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
        return array(
            array('8881837188'),
            array('2266111566'),
            array('2123456802'),
            array('888 18 3 7 1-88'),
            array('2-7605-1028-X')
        );
    }

    /**
     * getInvalidIsbn10: data provider
     *
     * @return array
     */
    public function getInvalidIsbn10()
    {
        return array(
            array('8881837187'),
            array('888183718A'),
            array('stringof10'),
            array(888183718),       // not a string
            array(88818371880),     // not 10 chars found
            array('88818371880'),   // not 10 chars found
            array('8881837188A'),   // not numeric-only
            array('8881837189'),    // bad checksum digit
            array(''),
            array(' '),
            array(null)
        );
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
        \PHPUnit_Framework_Error_Deprecated::$enabled = false;
        $this->assertTrue(Isbn10::validate($isbn10));
        \PHPUnit_Framework_Error_Deprecated::$enabled = true;
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
        \PHPUnit_Framework_Error_Deprecated::$enabled = false;
        $this->assertFalse(Isbn10::validate($isbn10));
        \PHPUnit_Framework_Error_Deprecated::$enabled = true;
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
