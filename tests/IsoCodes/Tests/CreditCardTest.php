<?php

namespace IsoCodes\Tests;

use IsoCodes\CreditCard;

/**
 * @covers Isocodes\CreditCard
 */
class CreditCardTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    /**
     * getCreditCards: data provider
     *
     * @return array
     */
    public function getCreditCards()
    {
        return array(
            //good:
            array( '340000000000009',    true ), //American Express
            array( '30000000000004',     true ), //Carte Blanche
            array( '6011000000000004',   true ), //Discover
            array( '38520000023237',     true ), //DinersClub
            array( '201400000000009',    true ), //enRoute
            array( '2131000000000008',   true ), //JCB
            array( '5500000000000004',   true ), //MasterCard
            array( '6334000000000004',   true ), //Solo
            array( '4903010000000009',   true ), //Switch
            array( '4111111111111111',   true ), //Visa
            array( '6304100000000008',   true ), //Laser
            array( 6304100000000008,     true ), //Laser
            //bad:
            array( 'CE1EL2LLFFF',        false ),
            array( 'E31DCLLFFF',         false ),
            array( '',                   false ),
            array( ' ',                  false )
        );
    }

    /**
     * testCreditCard
     *
     * @dataProvider getCreditCards
     *
     * @param mixed $creditCard
     * @param bool $result
     *
     * @return void
     */
    public function testCreditCard($creditCard, $result)
    {
        $this->assertEquals( CreditCard::validate( $creditCard ), $result );
    }

}
