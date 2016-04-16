<?php

namespace IsoCodes\Tests;

/**
 * NifTest
 *
 * @covers Isocodes\Nif
 */
class NifTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return array(
            array('04381012H'),     // DNI
            array('04381012h'),     // CAPS is not required
            array('12345678Z'),     // DNI
            array('99999999R'),     // DNI
            array('Z6171167L'),     // NIE Z
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return array(
            array('A08000143'),     // NIF is not CIF (Código de identificación fiscal)
            array('12345678'),      // no end control
            array('9999999L'),      // to few numbers
            array('999999999L'),    // to many numbers
            array('12345678W'),     // DNI: last control digit KO
            array('L9999999K'),     // NIF: first digit OK, end control digit KO
            array('A9999999L'),     // NIF: first digit KO, end control digit KO
            array('A9999999L'),     // NIF: first digit KO, end control digit OK
        );
    }
}
