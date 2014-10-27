<?php

namespace IsoCodes\Tests;

use IsoCodes\SwiftBic;

/**
 * SwiftBicTest
 *
 * @covers IsoCodes\SwiftBic
 */
class SwifBicTest extends \PHPUnit_Framework_TestCase
{

    /**
     * getValidSwiftBic: data Provider
     *
     * @return array
     */
    public function getValidSwiftBic()
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
     * getInvalidSwiftBic: data Provider
     *
     * @return array
     */
    public function getInvalidSwiftBic()
    {
        return array(
            array('CE1EL2LLFFF'),
            array('E31DCLLFFF'),
            array(''),
            array(' '),
            array(null)
        );
    }

    /**
     * testValidSwiftBic
     *
     * @param mixed $swiftBic
     *
     * @dataProvider getValidSwiftBic
     *
     * return void
     */
    public function testValidSwiftBic($swiftBic)
    {
        $this->assertTrue(SwiftBic::validate($swiftBic));
    }

    /**
     * testInvalidSwiftBic
     *
     * @param mixed $swiftBic
     *
     * @dataProvider getInvalidSwiftBic
     *
     * return void
     */
    public function testInvalidSwiftBic($swiftBic)
    {
        $this->assertFalse(SwiftBic::validate($swiftBic));
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
