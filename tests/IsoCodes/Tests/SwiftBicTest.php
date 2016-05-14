<?php

namespace IsoCodes\Tests;

/**
 * SwiftBicTest
 *
 * @covers IsoCodes\SwiftBic
 */
class SwiftBicTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return array(
            array('RBOSGGSX'),
            array('RZTIAT22263'),
            array('BCEELULL'),
            array('MARKDEFF'),
            array('GENODEF1JEV'),
            array('UBSWCHZH80A'),
            array('CEDELULLXXX'),
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
