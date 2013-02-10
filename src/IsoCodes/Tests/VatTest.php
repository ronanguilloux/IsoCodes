<?php

namespace IsoCodes\Tests;

use IsoCodes\Vat;

/**
 * @covers IsoCodes\Vat
 */
class VatTest extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        parent::__construct();
        $this->setName( "VAT unit test case" );
    }

    protected function setUp()
    {
        parent::setUp();
    }

    public function testValidVat()
    {
        $this->assertTrue( Vat::validate( 'DE123456789' ));
        $this->assertTrue( Vat::validate( 'EE123456789' ));
        $this->assertTrue( Vat::validate( 'EL123456789' ));
        $this->assertTrue( Vat::validate( 'PT123456789' ));

        $this->assertTrue( Vat::validate( 'BE0123456789' ));
        $this->assertTrue( Vat::validate( 'PL1234567890' ));
        $this->assertTrue( Vat::validate( 'SK1234567890' ));

        $this->assertTrue( Vat::validate( 'ATU12345678' ));

        $this->assertTrue( Vat::validate( 'BG123456789' ));
        $this->assertTrue( Vat::validate( 'BG1234567890' ));

        $this->assertTrue( Vat::validate( 'CY12345678A' ));

        $this->assertTrue( Vat::validate( 'DK12345678' ));
        $this->assertTrue( Vat::validate( 'FI12345678' ));
        $this->assertTrue( Vat::validate( 'HU12345678' ));
        $this->assertTrue( Vat::validate( 'LU12345678' ));
        $this->assertTrue( Vat::validate( 'MT12345678' ));
        $this->assertTrue( Vat::validate( 'SI12345678' ));

        $this->assertTrue( Vat::validate( 'ESA1234567Z' ));
        $this->assertTrue( Vat::validate( 'ESX12345678' ));
        $this->assertTrue( Vat::validate( 'ES12345678X' ));
        $this->assertTrue( Vat::validate( 'ESX1234567X' ));

        $this->assertTrue( Vat::validate( 'IE1234567X' ));
        $this->assertTrue( Vat::validate( 'IE1X12345X' ));

        $this->assertTrue( Vat::validate( 'IT12345678901' ));
        $this->assertTrue( Vat::validate( 'FR12345678901' ));
        $this->assertTrue( Vat::validate( 'LV12345678901' ));

        $this->assertTrue( Vat::validate( 'LT123456789' ));
        $this->assertTrue( Vat::validate( 'LT123456789012' ));

        $this->assertTrue( Vat::validate( 'NL123456789B01'));

        $this->assertTrue( Vat::validate( 'CZ12345678' ));
        $this->assertTrue( Vat::validate( 'CZ123456789' ));
        $this->assertTrue( Vat::validate( 'CZ1234567890' ));

        $this->assertTrue( Vat::validate( 'RO12' ));
        $this->assertTrue( Vat::validate( 'RO123' ));
        $this->assertTrue( Vat::validate( 'RO1234' ));
        $this->assertTrue( Vat::validate( 'RO12345' ));
        $this->assertTrue( Vat::validate( 'RO123456' ));
        $this->assertTrue( Vat::validate( 'RO1234567' ));
        $this->assertTrue( Vat::validate( 'RO12345678' ));
        $this->assertTrue( Vat::validate( 'RO123456789' ));
        $this->assertTrue( Vat::validate( 'RO1234567890' ));

        $this->assertTrue( Vat::validate( 'GB123456789' ));
        $this->assertTrue( Vat::validate( 'GB123456789012' ));

        $this->assertTrue( Vat::validate( 'SE123456789012' ));

    }

    public function testInvalidVat()
    {
        $this->assertFalse( Vat::validate( '' ));
        $this->assertFalse( Vat::validate( ' ' ));
        $this->assertFalse( Vat::validate( null ));
        $this->assertFalse( Vat::validate( array() ));
        $this->assertFalse( Vat::validate( 999999999 ));
        $this->assertFalse( Vat::validate( 9999.9999 ));
        $this->assertFalse( Vat::validate( "aaa" ));
        $this->assertFalse( Vat::validate( "&é\"'(-è_çà$^$*,;:!¨£%µ?./§¹~#{[|->\^@]}¤->^̣··´" ));

        $this->assertFalse( Vat::validate( 'DE12345678' ));
        $this->assertFalse( Vat::validate( 'EE1234567' ));
        $this->assertFalse( Vat::validate( 'EL123456' ));
        $this->assertFalse( Vat::validate( 'PT12345' ));

        $this->assertFalse( Vat::validate( 'BE123456789' ));
        $this->assertFalse( Vat::validate( 'BE1234567890' ));
        $this->assertFalse( Vat::validate( 'BE1234' ));
        $this->assertFalse( Vat::validate( 'PL123' ));
        $this->assertFalse( Vat::validate( 'SK12' ));

        $this->assertFalse( Vat::validate( 'ATU1' ));

        $this->assertFalse( Vat::validate( 'BG12345678' ));
        $this->assertFalse( Vat::validate( 'BG12345678901' ));

        $this->assertFalse( Vat::validate( 'CY123456789' ));
        $this->assertFalse( Vat::validate( 'CY12345678a' ));

        $this->assertFalse( Vat::validate( 'DK123456789' ));
        $this->assertFalse( Vat::validate( 'FI1234567' ));
        $this->assertFalse( Vat::validate( 'HU123456' ));
        $this->assertFalse( Vat::validate( 'LU12345' ));
        $this->assertFalse( Vat::validate( 'MT1234' ));
        $this->assertFalse( Vat::validate( 'SI123' ));

        $this->assertFalse( Vat::validate( 'ES1234567' ));
        $this->assertFalse( Vat::validate( 'ES12345678' ));
        $this->assertFalse( Vat::validate( 'ES123456789' ));
        $this->assertFalse( Vat::validate( 'ESABCDEFGHI' ));
        $this->assertFalse( Vat::validate( 'ESa12345678' ));
        $this->assertFalse( Vat::validate( 'ES12345678z' ));
        $this->assertFalse( Vat::validate( 'ESazertyuio' ));
        $this->assertFalse( Vat::validate( 'ESazerty123' ));
        $this->assertFalse( Vat::validate( 'ESazertyuiop' ));

        $this->assertFalse( Vat::validate( 'IE1234567' ));
        $this->assertFalse( Vat::validate( 'IEazertyuio' ));
        $this->assertFalse( Vat::validate( 'IEazertyui' ));
        $this->assertFalse( Vat::validate( 'IEazerty12' ));

        $this->assertFalse( Vat::validate( 'IT123456789012' ));
        $this->assertFalse( Vat::validate( 'FR123456789' ));
        $this->assertFalse( Vat::validate( 'LV12345678' ));

        $this->assertFalse( Vat::validate( 'LT12345678' ));
        $this->assertFalse( Vat::validate( 'LT1234567890' ));
        $this->assertFalse( Vat::validate( 'LT12345678901' ));
        $this->assertFalse( Vat::validate( 'LT1234567890123' ));

        $this->assertFalse( Vat::validate( 'NL12345678B012'));
        $this->assertFalse( Vat::validate( 'NL123456789BB0'));
        $this->assertFalse( Vat::validate( 'NL123456789B0B'));
        $this->assertFalse( Vat::validate( 'NL123456789012' ));
        $this->assertFalse( Vat::validate( 'NL12345678901' ));
        $this->assertFalse( Vat::validate( 'NL1234567890123' ));

        $this->assertFalse( Vat::validate( 'CZ1234567' ));
        $this->assertFalse( Vat::validate( 'CZ12345678901' ));

        $this->assertFalse( Vat::validate( 'RO1' ));
        $this->assertFalse( Vat::validate( 'RO12345678901' ));

        $this->assertFalse( Vat::validate( 'GB12345678' ));

        $this->assertFalse( Vat::validate( 'SE12345678901' ));
        $this->assertFalse( Vat::validate( 'SE1234567890123' ));

    }
    public function testEmptyCountryCode()
    {
        $this->assertFalse( Vat::validate( '1234579' ));
    }

    public function testUnkownCountryCode()
    {
        $this->assertFalse( Vat::validate( 'XX1234579' ));
    }

    public function testInvalidLowerCaseCountry()
    {
        $this->assertFalse( Vat::validate( 'de123456789' ));
    }

}
