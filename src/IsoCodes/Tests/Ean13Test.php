<?php

namespace IsoCodes\Tests;

use IsoCodes\Ean13;

/**
 * @covers Isocodes\Ean13
 */
class Ean13Test extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        parent::__construct();
        $this->setName( "Ean13 unit test case" );
    }

    protected function setUp()
    {
        parent::setUp();
    }


    public function testValidEan13()
    {
        $this->assertEquals( Ean13::validate( '4719512002889' ), true ); // Source: Wikipedia
        $this->assertEquals( Ean13::validate( '9782868890061' ), true ); // Source: Wikipedia
        $this->assertEquals( Ean13::validate( '4006381333931' ), true ); // Stabilo Point 88 Art. No. 88/57
    }

    public function testInvalidEan13()
    {
        $this->assertEquals( Ean13::validate( '2266111566' ), false ); // not 13 chars found
        $this->assertEquals( Ean13::validate( 'A782868890061' ), false ); // not numeric-only
        $this->assertEquals( Ean13::validate( '4006381333932' ), false ); // bad checksum digit
    }

    public function testEmptyEan13AsInvalid()
    {
        $this->assertEquals( Ean13::validate( '' ), false );
        $this->assertEquals( Ean13::validate( ' ' ), false );
    }
}
