<?php

namespace IsoCodes\Tests;

/**
 * GlnTest
 *
 * @covers Isocodes\Gln
 */
class GlnTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['0614141000012'],     // Checked using http://www.gs1.org/check-digit-calculator
            ['0614141000029'],     // Checked using http://www.gs1.org/check-digit-calculator
            ['0614141000036'],     // Checked using http://www.gs1.org/check-digit-calculator
            ['0614141 00002 9'],   // hyphens are OK (space)
            ['0614141-00003-6'],   // hyphens are OK (dash)
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            [0000000000000],       // 13 zeros only
            ['0000000000000'],     // string containing 13 zeros
            [061414100001],        // not 13 chars found
            ['061414100001'],      // not 13 chars found
            ['A614141000016'],     // not numeric-only
            ['0614141000015'],     // bad checksum digit
            ['0614141.00001.6'],   // dot hyphens are not OK.
        ];
    }
}
