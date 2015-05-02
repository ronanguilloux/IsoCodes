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
        return [
            ['04381012H'],     // DNI
            ['04381012h'],     // CAPS is not required
            ['12345678Z'],     // DNI
            ['99999999R'],     // DNI
            ['Z6171167L'],     // NIE Z
        ];
    }

    /**
     * getValidNifs: data provider
     *
     * @return array
     */
    public function getInvalidNifs()
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
            [' '],
            [''],
            [null]
        ];
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
