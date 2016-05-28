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
        return [
            ['340000000000009'],        //American Express
            ['30000000000004'],         //Carte Blanche
            ['6011000000000004'],       //Discover
            ['38520000023237'],         //DinersClub
            ['201400000000009'],        //enRoute
            ['2131000000000008'],       //JCB
            ['5500000000000004'],       //MasterCard
            ['6334000000000004'],       //Solo
            ['4903010000000009'],       //Switch
            ['4111111111111111'],       //Visa
            ['6304100000000008'],       //Laser
            [6304100000000008],         //Laser
            ['4917300800000000'],       // VisaElectron
            ['6759649826438453'],       // Maestro (long)
            ['6799990100000000019'],    // maestro (short)
            ['6007220000000004'],       // Forbrugsforeningen
            ['5019717010103742'],       // Dankort
            ['6271136264806203568']     // UnionPay
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['ABCDEFJHIGK'],
            ['abcdefghijk'],
            ['CE1EL2LLFFF'],
            ['E31DCLLFFF']
        ];
    }
}
