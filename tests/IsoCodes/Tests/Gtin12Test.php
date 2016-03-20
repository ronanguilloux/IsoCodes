<?php

namespace IsoCodes\Tests;

use IsoCodes\Gtin12;

/**
 * Gtin12Test
 *
 * @covers Isocodes\Gtin12
 */
class Gtin12Test extends \PHPUnit_Framework_TestCase
{
    /**
     * getValidGtin12: data provider
     *
     * @return array
     */
    public function getValidGtin12()
    {
        return [
            ['614141000036'],       // http://www.gs1.org/barcodes/ean-upc
            ['1-23456-78999-9'],    // https://en.wikipedia.org/wiki/Universal_Product_Code
        ];
    }

    /**
     * getInvalidGtin12: data provider
     *
     * @return array
     */
    public function getInvalidGtin12()
    {
        return [
            [614141000037],       // bad checksum digit
            [61414100003],        // not 13 chars found
            ['61414100003'],      // not 13 chars found
            ['A14141000036'],     // not numeric-only
            ['1.23456.78999.9'],   // dot hyphens are not OK.
            [''],
            [' ']
        ];
    }

    /**
     * testValidGtin12
     *
     * @param mixed $gtin12
     *
     * @dataProvider getValidGtin12
     *
     * @return void
     */
    public function testValidGtin12($gtin12)
    {
        $this->assertTrue(Gtin12::validate($gtin12));
    }

    /**
     * testInvalidGtin12
     *
     * @param mixed $gtin12
     *
     * @dataProvider getInvalidGtin12
     *
     * @return void
     */
    public function testInvalidGtin12($gtin12)
    {
        $this->assertFalse(Gtin12::validate($gtin12));
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
