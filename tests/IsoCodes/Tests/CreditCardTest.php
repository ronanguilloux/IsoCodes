<?php

namespace IsoCodes\Tests;

use IsoCodes\CreditCard;

/**
 * CreditCardTest
 *
 * @covers Isocodes\CreditCard
 */
class CreditCardTest extends \PHPUnit_Framework_TestCase
{
    /**
     * getValidCreditCards: data provider
     *
     * @return array
     */
    public function getValidCreditCards()
    {
        return array(
            array('340000000000009'),   //American Express
            array('30000000000004'),    //Carte Blanche
            array('6011000000000004'),  //Discover
            array('38520000023237'),    //DinersClub
            array('201400000000009'),   //enRoute
            array('2131000000000008'),  //JCB
            array('5500000000000004'),  //MasterCard
            array('6334000000000004'),  //Solo
            array('4903010000000009'),  //Switch
            array('4111111111111111'),  //Visa
            array('6304100000000008'),  //Laser
            array(6304100000000008),    //Laser
        );
    }

    /**
     * getInvalidCreditCards: data provider
     *
     * @return array
     */
    public function getInvalidCreditCards()
    {
        return array(
            array('CE1EL2LLFFF'),
            array('E31DCLLFFF'),
            array(''),
            array(' ')
        );
    }

    /**
     * testValidCreditCard
     *
     * @param mixed $creditCard
     *
     * @dataProvider getValidCreditCards
     *
     * @return void
     */
    public function testValidCreditCard($creditCard)
    {
        $this->assertTrue(CreditCard::validate($creditCard));
    }

    /**
     * testInvalidCreditCard
     *
     * @param mixed $creditCard
     *
     * @dataProvider getInvalidCreditCards
     *
     * @return void
     */
    public function testInvalidCreditCard($creditCard)
    {
        $this->assertFalse(CreditCard::validate($creditCard));
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
