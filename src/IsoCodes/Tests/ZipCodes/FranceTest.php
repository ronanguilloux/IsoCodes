<?php

namespace IsoCodes\Tests\ZipCodes;

use IsoCodes\ZipCode;

class FranceTest extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        parent::__construct();
        $this->setName( "French zipcode unit test case" );
    }

    protected function setUp()
    {
        parent::setUp();
    }

    public function testValidFrenchZipCode()
    {
        $this->assertEquals( ZipCode::validate( '06000', 'France' ), true );
        $this->assertEquals( ZipCode::validate( '56000', 'France' ), true );
        $this->assertEquals( ZipCode::validate( '56420', 'France' ), true );
        $this->assertEquals( ZipCode::validate( '97114', 'France' ), true ); // 971 - 14, Trois-Rivières, Guadeloupe
        $this->assertEquals( ZipCode::validate( '99999', 'France' ), true ); // Service consommateurs
        $this->assertEquals( ZipCode::validate( '99123', 'France' ), true ); // Paris - Concours
        $this->assertEquals( ZipCode::validate( '98000', 'France' ), true ); // Monaco
        $this->assertEquals( ZipCode::validate( '00100', 'France' ), true ); // Armée
    }

    public function testInvalidFrenchZipCode()
    {
        $this->assertEquals( ZipCode::validate( '560', 'France' ), false );
        $this->assertEquals( ZipCode::validate( '5600', 'France' ), false );
        $this->assertEquals( ZipCode::validate( '560000', 'France' ), false );
        $this->assertEquals( ZipCode::validate( 'A56000', 'France' ), false );
        $this->assertEquals( ZipCode::validate( 'A5600', 'France' ), false );
        $this->assertEquals( ZipCode::validate( '56000A', 'France' ), false );
        $this->assertEquals( ZipCode::validate( 'A5600A', 'France' ), false );
        $this->assertEquals( ZipCode::validate( 'AAA', 'France' ), false );
        $this->assertEquals( ZipCode::validate( 'AAAA', 'France' ), false );
        $this->assertEquals( ZipCode::validate( 'AAAAA', 'France' ), false );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testEmptyZipCodeAsInvalid()
    {
        $this->assertEquals( ZipCode::validate( '', 'France' ), false );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testBlankZipCodeAsInvalid()
    {
        $this->assertEquals( ZipCode::validate( ' ', 'France' ), false );
    }

    public function testCountryCase()
    {
        $this->assertEquals( ZipCode::validate( '01000', 'France'), true );
        $this->assertEquals( ZipCode::validate( '01000', 'france'), true );
        $this->assertEquals( ZipCode::validate( '01000', 'FRANCE'), true );
    }
}
