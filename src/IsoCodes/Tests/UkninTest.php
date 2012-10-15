<?php

namespace IsoCodes\Tests;

use IsoCodes\Uknin;

class UkninTest extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        parent::__construct();
        $this->setName( "UK's National Insurance Number unit test case" );
    }

    protected function setUp()
    {
        parent::setUp();
    }


    public function testValidUknin()
    {
        $this->assertEquals( Uknin::validate( 'AB123456C' ), true );
        $this->assertEquals( Uknin::validate( 'EH123456A' ), true );
        $this->assertEquals( Uknin::validate( 'HG123456B' ), true );
    }

    public function testInvalidUknin()
    {
        $this->assertEquals( Uknin::validate( 'AD123456CA' ), false );
        $this->assertEquals( Uknin::validate( 'AD12345C' ), false );
        $this->assertEquals( Uknin::validate( 'AD123456' ), false );
        $this->assertEquals( Uknin::validate( 'AF123456C' ), false );
        $this->assertEquals( Uknin::validate( 'AB123456F' ), false );
        $this->assertEquals( Uknin::validate( 'TN011258F' ), false );
    }

    public function testEmptyUkninAsInvalid()
    {
        $this->assertEquals( Uknin::validate( '' ), false );
        $this->assertEquals( Uknin::validate( ' ' ), false );
    }
}
