<?php

namespace IsoCodes\Tests;

use IsoCodes\SwiftBic;

/**
 * @covers IsoCodes\SwiftBic
 */
class SwiftBicTest extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        parent::__construct();
        $this->setName( "SWIFT-BIC unit test case" );
    }

    protected function setUp()
    {
        parent::setUp();
    }


    public function testValidSwiftBic()
    {
        $this->assertEquals( SwiftBic::validate( 'RBOSGGSX' ), true );
        $this->assertEquals( SwiftBic::validate( 'RZTIAT22263' ), true );
        $this->assertEquals( SwiftBic::validate( 'BCEELULL' ), true );
        $this->assertEquals( SwiftBic::validate( 'MARKDEFF' ), true );
        $this->assertEquals( SwiftBic::validate( 'GENODEF1JEV' ), true );
        $this->assertEquals( SwiftBic::validate( 'UBSWCHZH80A' ), true );
        $this->assertEquals( SwiftBic::validate( 'CEDELULLXXX' ), true );
    }

    public function testInvalidSwiftBic()
    {
        $this->assertEquals( SwiftBic::validate( 'CE1EL2LLFFF' ), false );
        $this->assertEquals( SwiftBic::validate( 'E31DCLLFFF' ), false );
    }

    public function testEmptySwiftBicAsInvalid()
    {
        $this->assertEquals( SwiftBic::validate( '' ), false );
        $this->assertEquals( SwiftBic::validate( ' ' ), false );
    }
}
