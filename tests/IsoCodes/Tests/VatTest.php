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
        return array(
            array('DE123456789'),
            array('EE123456789'),
            array('EL123456789'),
            array('PT123456789'),
            array('BE0123456789'),
            array('PL1234567890'),
            array('SK1234567890'),
            array('ATU12345678'),
            array('BG123456789'),
            array('BG1234567890'),
            array('CY12345678A'),
            array('DK12345678'),
            array('FI12345678'),
            array('HU12345678'),
            array('LU12345678'),
            array('MT12345678'),
            array('SI12345678'),
            array('ESA1234567Z'),
            array('ESX12345678'),
            array('ES12345678X'),
            array('ESX1234567X'),
            array('IE1234567X'),
            array('IE1X12345X'),
            array('IT12345678901'),
            array('FR12345678901'),
            array('LV12345678901'),
            array('LT123456789'),
            array('LT123456789012'),
            array('NL123456789B01'),
            array('CZ12345678'),
            array('CZ123456789'),
            array('CZ1234567890'),
            array('RO12'),
            array('RO123'),
            array('RO1234'),
            array('RO12345'),
            array('RO123456'),
            array('RO1234567'),
            array('RO12345678'),
            array('RO123456789'),
            array('RO1234567890'),
            array('GB123456789'),
            array('GB123456789012'),
            array('SE123456789012')
        );
    }

    /**
     * getInvalidVat: data Provider
     *
     * @return array
     */
    public function getInvalidVat()
    {
        return array(
            array(''),
            array(' '),
            array(null),
            array(array()),
            array(999999999),
            array(9999.9999),
            array("aaa"),
            array("&é\"'array(-è_çà$^$*,;:!¨£%µ?./§¹~#{[|->\^@]}¤->^̣··´"),
            array('DE12345678'),
            array('EE1234567'),
            array('EL123456'),
            array('PT12345'),
            array('BE123456789'),
            array('BE1234567890'),
            array('BE1234'),
            array('PL123'),
            array('SK12'),
            array('ATU1'),
            array('BG12345678'),
            array('BG12345678901'),
            array('CY123456789'),
            array('CY12345678a'),
            array('DK123456789'),
            array('FI1234567'),
            array('HU123456'),
            array('LU12345'),
            array('MT1234'),
            array('SI123'),
            array('ES1234567'),
            array('ES12345678'),
            array('ES123456789'),
            array('ESABCDEFGHI'),
            array('ESa12345678'),
            array('ES12345678z'),
            array('ESazertyuio'),
            array('ESazerty123'),
            array('ESazertyuiop'),
            array('IE1234567'),
            array('IEazertyuio'),
            array('IEazertyui'),
            array('IEazerty12'),
            array('IT123456789012'),
            array('FR123456789'),
            array('LV12345678'),
            array('LT12345678'),
            array('LT1234567890'),
            array('LT12345678901'),
            array('LT1234567890123'),
            array('NL12345678B012'),
            array('NL123456789BB0'),
            array('NL123456789B0B'),
            array('NL123456789012'),
            array('NL12345678901'),
            array('NL1234567890123'),
            array('CZ1234567'),
            array('CZ12345678901'),
            array('RO1'),
            array('RO12345678901'),
            array('GB12345678'),
            array('SE12345678901'),
            array('SE1234567890123'),
            array('1234579'),
            array('XX1234579'), // unknown
            array('de123456789') // lowercase is invalid
        );
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
