<?php

namespace IsoCodes\Tests;

use IsoCodes\Ean13;

/**
 * Ean13Test
 *
 * @covers Isocodes\Ean13
 */
class Ean13Test extends \PHPUnit_Framework_TestCase
{
    /**
     * getValidEan13: data provider
     *
     * @return array
     */
    public function getValidEan13()
    {
        return array(
            array('4719512002889', true), // Source: Wikipedia
            array('9782868890061', true), // Source: Wikipedia
            array('4006381333931', true), // Stabilo Point 88 Art. No. 88/57
        );
    }

    /**
     * getInvalidEan13: data provider
     *
     * @return array
     */
    public function getInvalidEan13()
    {
        return array(
            array(4006381333931, false), // not a string
            array(2266111566, false), // not 13 chars found
            array('2266111566', false), // not 13 chars found
            array('A782868890061', false), // not numeric-only
            array('4006381333932', false), // bad checksum digit
            array('', false),
            array(' ', false)
        );
    }

    /**
     * testValidEan13
     *
     * @param mixed $ean13
     * @param bool  $result
     *
     * @dataProvider getValidEan13
     *
     * @return void
     */
    public function testValidEan13($ean13, $result)
    {
        $this->assertTrue(Ean13::validate($ean13));
    }

    /**
     * testInvalidEan13
     *
     * @param mixed $ean13
     * @param bool  $result
     *
     * @dataProvider getInvalidEan13
     *
     * @return void
     */
    public function testInvalidEan13($ean13, $result)
    {
        $this->assertFalse(Ean13::validate($ean13));
    }

    protected function setUp()
    {
        parent::setUp();
    }
}
