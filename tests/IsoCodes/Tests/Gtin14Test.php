<?php

namespace IsoCodes\Tests;

use IsoCodes\Gtin14;

/**
 * Gtin14Test
 *
 * @covers Isocodes\Gtin14
 */
class Gtin14Test extends \PHPUnit_Framework_TestCase
{
    /**
     * getValidGtin14: data provider
     *
     * @return array
     */
    public function getValidGtin14()
    {
        return [
            ['12345678901231'],
            ['00012345600012'], // http://www.gtin.info/
        ];
    }

    /**
     * getInvalidGtin14: data provider
     *
     * @return array
     */
    public function getInvalidGtin14()
    {
        return [
            [12345678901232],       // bad checksum digit
            [1234567890123],        // not 13 chars found
            ['1234567890123'],      // not 13 chars found
            ['A1234567890123'],     // not numeric-only
            ['12345.67890.1231'],   // dot hyphens are not OK.
            [''],
            [' ']
        ];
    }

    /**
     * testValidGtin14
     *
     * @param mixed $gtin14
     *
     * @dataProvider getValidGtin14
     *
     * @return void
     */
    public function testValidGtin14($gtin14)
    {
        $this->assertTrue(Gtin14::validate($gtin14));
    }

    /**
     * testInvalidGtin14
     *
     * @param mixed $gtin14
     *
     * @dataProvider getInvalidGtin14
     *
     * @return void
     */
    public function testInvalidGtin14($gtin14)
    {
        $this->assertFalse(Gtin14::validate($gtin14));
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
