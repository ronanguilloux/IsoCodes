<?php

namespace IsoCodes\Tests;

use IsoCodes\CodePostal;

class CodePostalTest extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        parent::__construct();
        $this->setName( "Code Postal fre-fr unit test case" );
    }

    protected function setUp()
    {
        parent::setUp();
    }


    public function testValidCodePostal()
    {
        $this->assertEquals( CodePostal::validate( '06000' ), true );
        $this->assertEquals( CodePostal::validate( '56000' ), true );
        $this->assertEquals( CodePostal::validate( '56420' ), true );
        $this->assertEquals( CodePostal::validate( '97114' ), true ); // 971 - 14, Trois-Rivières, Guadeloupe
        $this->assertEquals( CodePostal::validate( '99999' ), true ); // Service consommateurs
        $this->assertEquals( CodePostal::validate( '99123' ), true ); // Paris - Concours
        $this->assertEquals( CodePostal::validate( '98000' ), true ); // Monaco
        $this->assertEquals( CodePostal::validate( '00100' ), true ); // Armée
    }

    public function testInvalidCodePostal()
    {
        $this->assertEquals( CodePostal::validate( '560' ), false );
        $this->assertEquals( CodePostal::validate( '5600' ), false );
        $this->assertEquals( CodePostal::validate( '560000' ), false );
        $this->assertEquals( CodePostal::validate( 'A56000' ), false );
        $this->assertEquals( CodePostal::validate( 'A5600' ), false );
        $this->assertEquals( CodePostal::validate( '56000A' ), false );
        $this->assertEquals( CodePostal::validate( 'A5600A' ), false );
        $this->assertEquals( CodePostal::validate( 'AAA' ), false );
        $this->assertEquals( CodePostal::validate( 'AAAA' ), false );
        $this->assertEquals( CodePostal::validate( 'AAAAA' ), false );
    }

    public function testEmptyCodePostalAsInvalid()
    {
        $this->assertEquals( CodePostal::validate( '' ), false );
        $this->assertEquals( CodePostal::validate( ' ' ), false );
    }
}
?>
