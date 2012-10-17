<?php

namespace IsoCodes\Tests;

use IsoCodes\CreditCard;

/**
 * @covers CreditCard
 */
class CreditCardTest extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        parent::__construct();
        $this->setName( "Credit Card unit test case" );
    }

    protected function setUp()
    {
        parent::setUp();
    }


    public function testValidCreditCard()
    {
        $this->assertEquals( CreditCard::validate( '340000000000009' ), true ); //American Express
        $this->assertEquals( CreditCard::validate( '30000000000004' ), true ); //Carte Blanche
        $this->assertEquals( CreditCard::validate( '6011000000000004' ), true ); //Discover
        $this->assertEquals( CreditCard::validate( '38520000023237' ), true ); //DinersClub
        $this->assertEquals( CreditCard::validate( '201400000000009' ), true ); //enRoute
        $this->assertEquals( CreditCard::validate( '2131000000000008' ), true ); //JCB
        $this->assertEquals( CreditCard::validate( '5500000000000004' ), true ); //MasterCard
        $this->assertEquals( CreditCard::validate( '6334000000000004' ), true ); //Solo
        $this->assertEquals( CreditCard::validate( '4903010000000009' ), true ); //Switch
        $this->assertEquals( CreditCard::validate( '4111111111111111' ), true ); //Visa
        $this->assertEquals( CreditCard::validate( '6304100000000008' ), true ); //Laser

    }

    public function testInvalidCreditCard()
    {
        $this->assertEquals( CreditCard::validate( 'CE1EL2LLFFF' ), false );
        $this->assertEquals( CreditCard::validate( 'E31DCLLFFF' ), false );
    }

    public function testEmptyCreditCardAsInvalid()
    {
        $this->assertEquals( CreditCard::validate( '' ), false );
        $this->assertEquals( CreditCard::validate( ' ' ), false );
    }
}
?>
