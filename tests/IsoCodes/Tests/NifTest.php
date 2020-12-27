<?php

namespace IsoCodes\Tests;

/**
 * Class NifTest.
 *
 * @covers \IsoCodes\Nif
 */
class NifTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['04381012H'],     // DNI
            ['04381012h'],     // CAPS is not required
            ['12345678Z'],     // DNI
            ['99999999R'],     // DNI
            ['Z6171167L'],     // NIE Z
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['A08000143'],     // NIF is not CIF (Código de identificación fiscal)
            ['12345678'],      // no end control
            ['9999999L'],      // to few numbers
            ['999999999L'],    // to many numbers
            ['12345678W'],     // DNI: last control digit KO
            ['L9999999K'],     // NIF: first digit OK, end control digit KO
            ['A9999999L'],     // NIF: first digit KO, end control digit KO
            ['A9999999L'],     // NIF: first digit KO, end control digit OK
        ];
    }
}
