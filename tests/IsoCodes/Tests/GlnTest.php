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
        return array(
            array('0614141000012'),     // Checked using http://www.gs1.org/check-digit-calculator
            array('0614141000029'),     // Checked using http://www.gs1.org/check-digit-calculator
            array('0614141000036'),     // Checked using http://www.gs1.org/check-digit-calculator
            array('0614141 00002 9'),   // hyphens are OK (space)
            array('0614141-00003-6'),   // hyphens are OK (dash)
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return array(
            array(061414100001),        // not 13 chars found
            array('061414100001'),      // not 13 chars found
            array('A614141000016'),     // not numeric-only
            array('0614141000015'),     // bad checksum digit
            array('0614141.00001.6'),   // dot hyphens are not OK.
        );
    }
}
