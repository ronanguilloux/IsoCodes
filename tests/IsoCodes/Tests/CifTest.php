<?php

namespace IsoCodes\Tests;

use IsoCodes\Cif;

/**
 * CifTest
 *
 * @covers Isocodes\Cif
 */
class CifTest extends \PHPUnit_Framework_TestCase
{

    /**
     * getValidCifs: dataprovider
     *
     * @link http://www.linguee.fr/anglais-francais/traduction/cif+number.html
     *
     * @return array
     */
    public function getValidCifs()
    {
        return array(
            array('N0032484H'),
            array('A09212275'),
            array('A59032557'),
            array('A17031246'),
            array('B85358596'),
        );
    }

    /**
     * getValidCifs: dataprovider
     *
     * @return array
     */
    public function getInvalidCifs()
    {
        return array(
            array('N0032484'),      // no end control
            array('N0032484I'),     // NIF: first digit OK, end control digit KO
            array('M0032484I'),     // NIF: first digit KO, end control digit KO
            array('M0032484H'),     // NIF: first digit KO, end control digit OK
            array(' '),
            array(''),
            array(null)
        );
    }

    /**
     * testValidCif
     *
     * @param string $cif
     *
     * @dataProvider getValidCifs
     *
     * @return void
     */
    public function testValidCif($cif)
    {
        $this->assertTrue(Cif::validate($cif));
    }

    /**
     * testInvalidCif
     *
     * @param string $cif
     *
     * @dataProvider getInvalidCifs
     *
     * @return void
     */
    public function testInvalidCif($cif)
    {
        $this->assertFalse(Cif::validate($cif));
    }

    protected function setUp()
    {
        parent::setUp();
    }

}
