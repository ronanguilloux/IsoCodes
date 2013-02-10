<?php

namespace IsoCodes\Tests\ZipCodes;

use IsoCodes\ZipCode;

class CanadaTest extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        parent::__construct();
        $this->setName( "Canadian zipcode unit test case" );
    }

    protected function setUp()
    {
        parent::setUp();
    }

    public function testValidCanadianZipCode()
    {
       $this->assertEquals( ZipCode::validate( 'A0A 1A0', 'Canada' ), true ); // Aquaforte, Avalon Peninsula, Newfoundland and Labrador
       $this->assertEquals( ZipCode::validate( 'A0A1A0', 'Canada' ), true ); // Some Canadian people put a space in the middle, some don't
       $this->assertEquals( ZipCode::validate( 'H0H 0H0', 'Canada' ), true ); // North Pole (for Santa Claus only)
    }

    public function testInvalidCanadianZipCode()
    {
        $this->assertEquals( ZipCode::validate( '560', 'Canada' ), false );
        $this->assertEquals( ZipCode::validate( '5600', 'Canada' ), false );
        $this->assertEquals( ZipCode::validate( '560000', 'Canada' ), false );
        $this->assertEquals( ZipCode::validate( 'A56000', 'Canada' ), false );
        $this->assertEquals( ZipCode::validate( 'A5600', 'Canada' ), false );
        $this->assertEquals( ZipCode::validate( '56000A', 'Canada' ), false );
        $this->assertEquals( ZipCode::validate( 'A5600A', 'Canada' ), false );
        $this->assertEquals( ZipCode::validate( 'AAA', 'Canada' ), false );
        $this->assertEquals( ZipCode::validate( 'AAAA', 'Canada' ), false );
        $this->assertEquals( ZipCode::validate( 'AAAAA', 'Canada' ), false );
        $this->assertEquals( ZipCode::validate( 'A 0A1A0', 'Canada' ), false );
        $this->assertEquals( ZipCode::validate( 'A0 A1A0', 'Canada' ), false );
        $this->assertEquals( ZipCode::validate( 'A0A1 A0', 'Canada' ), false );
        $this->assertEquals( ZipCode::validate( 'A0A1A 0', 'Canada' ), false );
        $this->assertEquals( ZipCode::validate( 'A0A1a0', 'Canada' ), false );
        $this->assertEquals( ZipCode::validate( 'a0a1a0', 'Canada' ), false );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testEmptyZipCodeAsInvalid()
    {
        $this->assertEquals( ZipCode::validate( '', 'Canada' ), false );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testBlankZipCodeAsInvalid()
    {
        $this->assertEquals( ZipCode::validate( ' ', 'Canada' ), false );
    }

    public function testCountryCase()
    {
        $this->assertEquals( ZipCode::validate( 'A0A 1A0', 'Canada'), true );
        $this->assertEquals( ZipCode::validate( 'A0A1A0', 'canada'), true );
        $this->assertEquals( ZipCode::validate( 'A0A 1A0', 'CANADA'), true );
    }
}
