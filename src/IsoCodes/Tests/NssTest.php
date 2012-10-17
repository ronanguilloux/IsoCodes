<?php

namespace IsoCodes\Tests;

use IsoCodes\Nss;

/**
 * @covers Nss
 */
class NssTest extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        parent::__construct();
        $this->setName( "Nss unit test case" );
    }

    protected function setUp()
    {
        parent::setUp();
    }


    public function testValidNss()
    {
		$this->assertEquals( Nss::validate( '177022A00100229' ), true ); // Corse
		$this->assertEquals( Nss::validate( '253012A07300444' ), true ); // Corse
        $this->assertEquals( Nss::validate( '177025626004544' ), true );
        $this->assertEquals( Nss::validate( '253077507300483' ), true );
        $this->assertEquals( Nss::validate( '188057208107893' ), true );
    }

    public function testInvalidNss()
    {
        $this->assertEquals( Nss::validate( '353072B07300483' ), false );
        $this->assertEquals( Nss::validate( '253072C07300483' ), false );
    }

    public function testEmptyNssAsInvalid()
    {
        $this->assertEquals( Nss::validate( '' ), false );
        $this->assertEquals( Nss::validate( ' ' ), false );
    }

}
