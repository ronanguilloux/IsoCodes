<?php

namespace IsoCodes\Tests;

use IsoCodes\Bban;

/**
 * @covers Isocodes\Bban
 */
class BbanTest extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        parent::__construct();
        $this->setName( "Bban unit test case" );
    }

    protected function setUp()
    {
        parent::setUp();
    }

    public function testValidBban()
    {
    $this->assertEquals( Bban::validate( '15459450000411700920U62' ), true );
    $this->assertEquals( Bban::validate( '10207000260402601177083' ), true );
    }

    public function testInvalidBban()
    {
    $this->assertEquals( Bban::validate( '15459 45000 0411700920U 62' ), false );
        $this->assertEquals( Bban::validate( '10207000260402601177084' ), false );
    }

    public function testEmptyBbanAsInvalid()
    {
        $this->assertEquals( Bban::validate( '' ), false );
        $this->assertEquals( Bban::validate( ' ' ), false );
    }
}
