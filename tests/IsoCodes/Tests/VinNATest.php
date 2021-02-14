<?php

namespace IsoCodes\Tests;

/**
 * Class CifTest.
 *
 * @covers \IsoCodes\VinNA
 */
class VinNATest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['1M8GDM9AXKP042788'], // https://en.wikipedia.org/wiki/Vehicle_identification_number#Worked_example
            ['WAUZZZF49HA036784'], // https://www.rac.co.uk/drive/advice/buying-and-selling-guides/vin-number/
            ['1HGBH41JXMN109186'], // https://www.yourmechanic.com/article/how-to-decode-a-vin-vehicle-identification-number-by-jason-unrau
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['1M8GDM9AYKP042788'], // wrong check
        ];
    }
}
