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
            array('4719512002889'),     // Source: Wikipedia
            array('9782868890061'),     // Source: Wikipedia
            array('4006381333931'),     // Stabilo Point 88 Art. No. 88/57
            array('978-2-1234-5680-3'), // hyphens are OK (dash)
            array('4719-5120-0288-9'),  // hyphens are OK (dash)
            array('978 2 1234 5680 3'), // hyphens are OK (space
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
            array(2266111566),          // not 13 chars found
            array('2266111566'),        // not 13 chars found
            array('A782868890061'),     // not numeric-only
            array('4006381333932'),     // bad checksum digit
            array('4719.5120.0288.9'),  // dot hyphens are not OK.
            array(''),
            array(' ')
        );
    }

    /**
     * testValidEan13
     *
     * @param mixed $ean13
     *
     * @dataProvider getValidEan13
     *
     * @return void
     */
    public function testValidEan13($ean13)
    {
        $this->assertTrue(Ean13::validate($ean13));
    }

    /**
     * testInvalidEan13
     *
     * @param mixed $ean13
     *
     * @dataProvider getInvalidEan13
     *
     * @return void
     */
    public function testInvalidEan13($ean13)
    {
        $this->assertFalse(Ean13::validate($ean13));
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
