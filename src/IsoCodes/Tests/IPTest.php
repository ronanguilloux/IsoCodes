<?php

namespace IsoCodes\Tests;

use IsoCodes\IP;

class IPTest extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        parent::__construct();
        $this->setName( "IP unit test case" );
    }

    protected function setUp()
    {
        parent::setUp();
    }


    public function testValidIP()
    {
        $this->assertEquals( IP::validate( '93.184.220.20' ), true ); // 中华人民共和国
        $this->assertEquals( IP::validate( '161.148.172.130'), true ); // www.brazil.gov.br
        $this->assertEquals( IP::validate( '161.148.172.130'), true ); // www.brazil.gov.br
        $this->assertEquals( IP::validateIPV6( '2001:0db8:0000:85a3:0000:0000:ac1f:8001'), true );
        $this->assertEquals( IP::validateIPV6( '2001:db8:0:85a3:0:0:ac1f:8001'), true ); // equivalent
        $this->assertEquals( IP::validate( '173.194.66.94' ), true ); // google.co.uk
        $this->assertEquals( IP::validate( '160.92.167.193' ), true ); // france.fr
        $this->assertEquals( IP::validate( '192.168.1.1'), true ); // LAN
        $this->assertEquals( IP::validate( '0.0.0.0'), true );
        $this->assertEquals( IP::validate( '255.255.255.255'), true );
    }

    public function testInvalidIP()
    {

        $this->assertEquals( IP::validateIPV6( '0db8:0000:85a3:0000:0000:ac1f:8001'), false );
        $this->assertEquals( IP::validateIPV6( '2001:0db8:0000:85a3:0000:0000:ac1f'), false );
        $this->assertEquals( IP::validate( '000.000.000.000'), false );
        $this->assertEquals( IP::validate( '256.255.255.255'), false );
        $this->assertEquals( IP::validateIPV6( '93.184.220.20' ), false ); // not IPV6
        $this->assertEquals( IP::validate( '2001:0db8:0000:85a3:0000:0000:ac1f:8001'), false ); // not IPV4
        $this->assertEquals( IP::validate( '2001:db8:0:85a3:0:0:ac1f:8001'), false ); // not IPV4
    }

    public function testEmptyIPAsInvalid()
    {
        $this->assertEquals( IP::validate( '' ), false );
        $this->assertEquals( IP::validate( ' ' ), false );
    }
}
