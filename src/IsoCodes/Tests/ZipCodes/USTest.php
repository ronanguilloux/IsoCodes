<?php

namespace IsoCodes\Tests\ZipCodes;

use IsoCodes\ZipCode;

class USTest extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        parent::__construct();
        $this->setName( "US zipcode unit test case" );
    }

    protected function setUp()
    {
        parent::setUp();
    }

    public function testValidCanadianZipCode()
    {
       $this->assertEquals( ZipCode::validate( '99801', 'US' ), true ); // Juneau, Alaska
       $this->assertEquals( ZipCode::validate( '02115', 'US' ), true ); // Boston
       $this->assertEquals( ZipCode::validate( '10001', 'US' ), true ); // New York City
       $this->assertEquals( ZipCode::validate( '20008', 'US' ), true ); // Washington, D.C.
       $this->assertEquals( ZipCode::validate( '99950', 'US' ), true ); // Ketchikan, Alaska (the highest ZIP code)
    }

    public function testInvalidCanadianZipCode()
    {
        $this->assertEquals( ZipCode::validate( '560', 'US' ), false );
        $this->assertEquals( ZipCode::validate( '5600', 'US' ), false );
        $this->assertEquals( ZipCode::validate( '560000', 'US' ), false );
        $this->assertEquals( ZipCode::validate( 'A56000', 'US' ), false );
        $this->assertEquals( ZipCode::validate( 'A5600', 'US' ), false );
        $this->assertEquals( ZipCode::validate( '56000A', 'US' ), false );
        $this->assertEquals( ZipCode::validate( 'A5600A', 'US' ), false );
        $this->assertEquals( ZipCode::validate( 'AAA', 'US' ), false );
        $this->assertEquals( ZipCode::validate( 'AAAA', 'US' ), false );
        $this->assertEquals( ZipCode::validate( 'AAAAA', 'US' ), false );
        $this->assertEquals( ZipCode::validate( 'A 0A1A0', 'US' ), false );
        $this->assertEquals( ZipCode::validate( 'A0 A1A0', 'US' ), false );
        $this->assertEquals( ZipCode::validate( 'A0A1 A0', 'US' ), false );
        $this->assertEquals( ZipCode::validate( 'A0A1A 0', 'US' ), false );
        $this->assertEquals( ZipCode::validate( 'A0A1a0', 'US' ), false );
        $this->assertEquals( ZipCode::validate( 'a0a1a0', 'US' ), false );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testEmptyZipCodeAsInvalid()
    {
        $this->assertEquals( ZipCode::validate( '', 'US' ), false );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testBlankZipCodeAsInvalid()
    {
        $this->assertEquals( ZipCode::validate( ' ', 'US' ), false );
    }

}
