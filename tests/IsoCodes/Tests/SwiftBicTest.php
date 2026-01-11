<?php

namespace IsoCodes\Tests;

/**
 * Class SwiftBicTest.
 *
 * @covers \IsoCodes\SwiftBic
 */
class SwiftBicTest extends AbstractIsoCodeInterfaceTest
{
    public function getValidValues()
    {
        return [
            ['RBOSGGSX'],
            ['RZTIAT22263'],
            ['BCEELULL'],
            ['MARKDEFF'],
            ['GENODEF1JEV'],
            ['UBSWCHZH80A'],
            ['CEDELULLXXX'],
            ['ABNANL2A'],
        ];
    }

    public function getInvalidValues()
    {
        return [
            ['CE1EL2LLFFF'],
            ['E31DCLLFFF'],
            ['ABNANL13'],
        ];
    }
}
