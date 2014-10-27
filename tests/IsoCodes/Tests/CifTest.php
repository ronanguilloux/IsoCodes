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
     * getValidCifs: data provider
     *
     * @link http://www.linguee.fr/anglais-francais/traduction/cif+number.html
     *
     * @return array
     */
    public function getValidCifs()
    {
        return array(
            array('N0032484H'), // non-resident
            array('A09212275'),
            array('A59032557'), // Public companies, “Sociedades Anonimas” or ‘SA’s
            array('A17031246'),
            array('B85358596'), // ‘Sociedades de Responsibilidad Limitada’ or ‘SL’s’
            array('E61685095'), // Business Partnerships, ‘Communidades de Bienes’ or ‘CB’s’
            array('V27236942'),
            array('G61685095'),
        );
    }

    /**
     * getValidCifs: data provider
     *
     * @return array
     */
    public function getInvalidCifs()
    {
        return array(
            array('K11111111'), // Spanish children under the age of 14 who need a fiscal number
            array('L61685095'), // Spanish citizens resident outside Spain who do not have a Spanish Identity Card
            array('X61685095'), // Foreign individuals with financial interests in Spain < 15/07/2008
            array('Y61685095'), // Foreign individuals with financial interests in Spain > 15/07/2008
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

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
