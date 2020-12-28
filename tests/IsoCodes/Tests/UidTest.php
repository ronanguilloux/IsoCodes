<?php

namespace IsoCodes\Tests;

/**
 * Class UidTest.
 *
 * @covers \IsoCodes\Uid
 */
class UidTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['CHE-116.281.710'],        // https://vatstack.com/articles/switzerland-vat-number-validation
            ['CHE116281710MWST'],       // same
            ['CHE 116 281 710 MWST'],   // same
            ['116.281.710'],            // same
            ['CHE109322551'],           // https://www.ech.ch/de/dokument/57be808d-9a03-4e9e-a2c5-65f08ca78e44
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['116.281.71'],         // 8 digits only
            ['CHF-116.281.710'],    // wrong prefix
        ];
    }
}
