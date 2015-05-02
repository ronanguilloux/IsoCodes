<?php

namespace IsoCodes\Tests;

use IsoCodes\Vat;

/**
 * VatTest
 *
 * @covers IsoCodes\Vat
 */
class VatTest extends \PHPUnit_Framework_TestCase
{

    /**
     * getValidVat: data Provider
     *
     * @return array
     */
    public function getValidVat()
    {
        return [
            ['DE123456789'],
            ['EE123456789'],
            ['EL123456789'],
            ['PT123456789'],
            ['BE0123456789'],
            ['PL1234567890'],
            ['SK1234567890'],
            ['ATU12345678'],
            ['BG123456789'],
            ['BG1234567890'],
            ['CY12345678A'],
            ['DK12345678'],
            ['FI12345678'],
            ['HU12345678'],
            ['LU12345678'],
            ['MT12345678'],
            ['SI12345678'],
            ['ESA1234567Z'],
            ['ESX12345678'],
            ['ES12345678X'],
            ['ESX1234567X'],
            ['IE1234567X'],
            ['IE1X12345X'],
            ['IT12345678901'],
            ['FR12345678901'],
            ['LV12345678901'],
            ['LT123456789'],
            ['LT123456789012'],
            ['NL123456789B01'],
            ['CZ12345678'],
            ['CZ123456789'],
            ['CZ1234567890'],
            ['RO12'],
            ['RO123'],
            ['RO1234'],
            ['RO12345'],
            ['RO123456'],
            ['RO1234567'],
            ['RO12345678'],
            ['RO123456789'],
            ['RO1234567890'],
            ['GB123456789'],
            ['GB123456789012'],
            ['SE123456789012']
        ];
    }

    /**
     * getInvalidVat: data Provider
     *
     * @return array
     */
    public function getInvalidVat()
    {
        return [
            [''],
            [' '],
            [null],
            [[]],
            [999999999],
            [9999.9999],
            ["aaa"],
            ["&é\"'array(-è_çà$^$*,;:!¨£%µ?./§¹~#{[|->\^@]}¤->^̣··´"],
            ['DE12345678'],
            ['EE1234567'],
            ['EL123456'],
            ['PT12345'],
            ['BE123456789'],
            ['BE1234567890'],
            ['BE1234'],
            ['PL123'],
            ['SK12'],
            ['ATU1'],
            ['BG12345678'],
            ['BG12345678901'],
            ['CY123456789'],
            ['CY12345678a'],
            ['DK123456789'],
            ['FI1234567'],
            ['HU123456'],
            ['LU12345'],
            ['MT1234'],
            ['SI123'],
            ['ES1234567'],
            ['ES12345678'],
            ['ES123456789'],
            ['ESABCDEFGHI'],
            ['ESa12345678'],
            ['ES12345678z'],
            ['ESazertyuio'],
            ['ESazerty123'],
            ['ESazertyuiop'],
            ['IE1234567'],
            ['IEazertyuio'],
            ['IEazertyui'],
            ['IEazerty12'],
            ['IT123456789012'],
            ['FR123456789'],
            ['LV12345678'],
            ['LT12345678'],
            ['LT1234567890'],
            ['LT12345678901'],
            ['LT1234567890123'],
            ['NL12345678B012'],
            ['NL123456789BB0'],
            ['NL123456789B0B'],
            ['NL123456789012'],
            ['NL12345678901'],
            ['NL1234567890123'],
            ['CZ1234567'],
            ['CZ12345678901'],
            ['RO1'],
            ['RO12345678901'],
            ['GB12345678'],
            ['SE12345678901'],
            ['SE1234567890123'],
            ['1234579'],
            ['XX1234579'], // unknown
            ['de123456789'] // lowercase is invalid
        ];
    }

    /**
     * testValidVat
     *
     * @param mixed $vat
     *
     * @dataProvider getValidVat
     *
     * return void
     */
    public function testValidVat($vat)
    {
        $this->assertTrue(Vat::validate($vat));
    }

    /**
     * testInvalidVat
     *
     * @param mixed $vat
     *
     * @dataProvider getInvalidVat
     *
     * return void
     */
    public function testInvalidVat($vat)
    {
        $this->assertFalse(Vat::validate($vat));
    }

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
    }
}
