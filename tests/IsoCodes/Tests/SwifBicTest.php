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
        return [
            ['RBOSGGSX'],
            ['RZTIAT22263'],
            ['BCEELULL'],
            ['MARKDEFF'],
            ['GENODEF1JEV'],
            ['UBSWCHZH80A'],
            ['CEDELULLXXX'],
        ];
    }

    /**
     * getInvalidSwiftBic: data Provider
     *
     * @return array
     */
    public function getInvalidSwiftBic()
    {
        return [
            ['CE1EL2LLFFF'],
            ['E31DCLLFFF'],
            [''],
            [' '],
            [null]
        ];
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
