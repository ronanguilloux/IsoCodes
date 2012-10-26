<?php

namespace IsoCodes\Tests;

use IsoCodes\Ssn;

/**
 * @covers IsoCodes\Ssn
 */
class SsnTest extends \PHPUnit_Framework_TestCase
{
    protected $ssn;

    public function __construct()
    {
        parent::__construct();
        $this->ssn = new Ssn();
        $this->setName( "US Social Security Number unit test case" );
    }

    protected function setUp()
    {
        parent::setUp();
    }

    public function testValidSSN()
    {
        // generated here : http://fr.fakenamegenerator.com/social-security-number.php

        //$this->assertEquals( $this->ssn->validate( '574-07-0776' ), true );
        $this->assertEquals( $this->ssn->validate( '423-05-9675' ), true );
        $this->assertEquals( $this->ssn->validate( '432-01-5257' ), true );
        $this->assertEquals( $this->ssn->validate( '600-01-4950' ), true );
        $this->assertEquals( $this->ssn->validate( '619-01-7173' ), true );
        $this->assertEquals( $this->ssn->validate( '651-01-3431' ), true );
    }

    public function testInvalidSSN()
    {
        $this->assertEquals( $this->ssn->validate( '574-09-0776' ), false );
        $this->assertEquals( $this->ssn->validate( '123-45-6789' ), false );
        $this->assertEquals( $this->ssn->validate( '1234-567-89' ), false );
        $this->assertEquals( $this->ssn->validate( '123456789' ), false );
        $this->assertEquals( $this->ssn->validate( '773-45-6789' ), false );
    }

    public function testEmptySSNAsInvalid()
    {
        $this->assertEquals( $this->ssn->validate( '' ), false );
        $this->assertEquals( $this->ssn->validate( ' ' ), false );
    }
}
