<?php

namespace IsoCodes\Tests;

/**
 * Gtin12Test
 *
 * @covers Isocodes\Gtin12
 */
class Gtin12Test extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['614141000036'],       // http://www.gs1.org/barcodes/ean-upc
            ['1-23456-78999-9'],    // https://en.wikipedia.org/wiki/Universal_Product_Code
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            [000000000000],       // zeros only
            ['000000000000'],     // string containing all zeros
            [614141000037],       // bad checksum digit
            [61414100003],        // not 13 chars found
            ['61414100003'],      // not 13 chars found
            ['A14141000036'],     // not numeric-only
            ['1.23456.78999.9'],   // dot hyphens are not OK.
        ];
    }
}
