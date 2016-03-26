<?php

namespace IsoCodes\Tests;

use IsoCodes\Gdti;

/**
 * GdtiTest
 *
 * @covers Isocodes\Gdti
 */
class GdtiTest extends \PHPUnit_Framework_TestCase
{
    /**
     * getValidGdti: data provider
     *
     * @return array
     */
    public function getValidGdti()
    {
        return array(
            array('4719512002889 1234567890 123456'), // valid GTIN13 + valid random optional serial number
            array('4719512002889-1234567890-123456'), // hyphens are OK (dash)
            array('4719512002889 1234567890 123456'), // hyphens are OK (space)
        );
    }

    /**
     * getInvalidGdti: data provider
     *
     * @return array
     */
    public function getInvalidGdti()
    {
        return array(
            array('471951200288-1234567890-123456'),// not 13 chars found in GTIN13 component
            array(4719512002881234567890123456), // same, but integer
            array('4719512002888-1234567890-123456'), // bad checksum digit
            array('4719512002889.1234567890.123456'),  // dot hyphens are not OK.
            array(''),
            array(' ')
        );
    }

    /**
     * testValidGdti
     *
     * @param mixed $gdti
     *
     * @dataProvider getValidGdti
     *
     * @return void
     */
    public function testValidGdti($gdti)
    {
        $this->assertTrue(Gdti::validate($gdti));
    }

    /**
     * testInvalidGdti
     *
     * @param mixed $gdti
     *
     * @dataProvider getInvalidGdti
     *
     * @return void
     */
    public function testInvalidGdti($gdti)
    {
        $this->assertFalse(Gdti::validate($gdti));
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
