<?php

namespace IsoCodes\Tests;

use IsoCodes\Grai;

/**
 * GraiTest
 *
 * @covers Isocodes\Grai
 */
class GraiTest extends \PHPUnit_Framework_TestCase
{
    /**
     * getValidGrai: data provider
     *
     * @return array
     */
    public function getValidGrai()
    {
        return array(
            array('04719512002889 1234567890 123456'), // valid GTIN13 + valid random optional serial number
            array('04719512002889-1234567890-123456'), // hyphens are OK (dash)
            array('04719512002889 1234567890 123456'), // hyphens are OK (space)
        );
    }

    /**
     * getInvalidGrai: data provider
     *
     * @return array
     */
    public function getInvalidGrai()
    {
        return array(
            array('0471951200288-1234567890-123456'),// not 13 chars found in GTIN13 component
            array(4719512002881234567890123456), // same, but integer
            array('04719512002888-1234567890-123456'), // bad checksum digit
            array('04719512002889.1234567890.123456'),  // dot hyphens are not OK.
            array(''),
            array(' ')
        );
    }

    /**
     * testValidGrai
     *
     * @param mixed $grai
     *
     * @dataProvider getValidGrai
     *
     * @return void
     */
    public function testValidGrai($grai)
    {
        $this->assertTrue(Grai::validate($grai));
    }

    /**
     * testInvalidGrai
     *
     * @param mixed $grai
     *
     * @dataProvider getInvalidGrai
     *
     * @return void
     */
    public function testInvalidGrai($grai)
    {
        $this->assertFalse(Grai::validate($grai));
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
