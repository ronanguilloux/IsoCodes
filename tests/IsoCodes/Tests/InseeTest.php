<?php

namespace IsoCodes\Tests;

/**
 * InseeTest
 *
 * @covers Isocodes\Insee
 */
class InseeTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return array(
            array('177022A00100229'),   // Corse: 2A
            array('253012B073004'),     // Corse: 2B, clef optionnelle omise
            array('177025626004544'),
            array('253077507300483'),
            array('188057208107893')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return array(
            array('353072B07300483'),
            array('253072C07300483'),
        );
    }
}
