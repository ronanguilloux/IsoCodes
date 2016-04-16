<?php

namespace IsoCodes\Tests;

/**
 * CreditCardTest
 *
 * @covers Isocodes\CreditCard
 */
class CreditCardTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
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
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return array(
            array('CE1EL2LLFFF'),
            array('E31DCLLFFF'),
        );
    }
}
