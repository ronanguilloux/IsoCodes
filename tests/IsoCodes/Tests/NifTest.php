<?php

namespace IsoCodes\Tests;

use IsoCodes\Nif;

/**
 * NifTest
 *
 * @covers Isocodes\Nif
 */
class NifTest extends \PHPUnit_Framework_TestCase
{

    /**
     * getValidNifs: data provider
     *
     * @return array
     */
    public function getValidNifs()
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
     * getValidNifs: data provider
     *
     * @return array
     */
    public function getInvalidNifs()
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
            array(' '),
            array(''),
            array(null)
        );
    }

    /**
     * testValidNif
     *
     * @param string $nif
     *
     * @dataProvider getValidNifs
     *
     * @return void
     */
    public function testValidNif($nif)
    {
        $this->assertTrue(Nif::validate($nif));
    }

    /**
     * testInvalidNif
     *
     * @param string $nif
     *
     * @dataProvider getInvalidNifs
     *
     * @return void
     */
    public function testInvalidNif($nif)
    {
        $this->assertFalse(Nif::validate($nif));
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
