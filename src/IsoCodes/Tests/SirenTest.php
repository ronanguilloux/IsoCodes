<?php

namespace IsoCodes\Tests;

use IsoCodes\Siren;

class SirenTest extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        parent::__construct();
        $this->setName( "SIREN unit test case" );
    }

    protected function setUp()
    {
        parent::setUp();
    }


    public function testValidSiren()
    {
        $this->assertEquals( Siren::validate( '440797074' ), true );
        $this->assertEquals( Siren::validate( '488537812' ), true );
        $this->assertEquals( Siren::validate( '432167567' ), true );
        $this->assertEquals( Siren::validate( '417625639' ), true );
        $this->assertEquals( Siren::validate( '334932720' ), true );
        $this->assertEquals( Siren::validate( '440288371' ), true );
        $this->assertEquals( Siren::validate( '517439543' ), true );
    }

    public function testInvalidSiren()
    {
        $this->assertEquals( Siren::validate( '44079707' ), false );
        $this->assertEquals( Siren::validate( '4407970745' ), false );
        $this->assertEquals( Siren::validate( '440797075' ), false );
        $this->assertEquals( Siren::validate( '488537813' ), false );
        $this->assertEquals( Siren::validate( '432167568' ), false );
        $this->assertEquals( Siren::validate( '417625630' ), false );
        $this->assertEquals( Siren::validate( '334932721' ), false );
        $this->assertEquals( Siren::validate( '440288372' ), false );
        $this->assertEquals( Siren::validate( '517439544' ), false );
    }

    public function testEmptySirenAsInvalid()
    {
        $this->assertEquals( Siren::validate( '' ), false );
        $this->assertEquals( Siren::validate( ' ' ), false );
        $this->assertEquals( Siren::validate( 'azertyuio' ), false );
    }
}
