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
        return [
            ['340000000000009'],   //American Express
            ['30000000000004'],    //Carte Blanche
            ['6011000000000004'],  //Discover
            ['38520000023237'],    //DinersClub
            ['201400000000009'],   //enRoute
            ['2131000000000008'],  //JCB
            ['5500000000000004'],  //MasterCard
            ['6334000000000004'],  //Solo
            ['4903010000000009'],  //Switch
            ['4111111111111111'],  //Visa
            ['6304100000000008'],  //Laser
            [6304100000000008],    //Laser
        ];
    }

    /**
     * getInvalidCreditCards: data provider
     *
     * @return array
     */
    public function getInvalidCreditCards()
    {
        return [
            ['CE1EL2LLFFF'],
            ['E31DCLLFFF'],
            [''],
            [' ']
        ];
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
