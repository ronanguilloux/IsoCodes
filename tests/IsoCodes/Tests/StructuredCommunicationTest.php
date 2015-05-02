<?php

namespace IsoCodes\Tests;

use IsoCodes\StructuredCommunication;

/**
 * StructuredCommunicationTest
 *
 * @covers Isocodes\StructuredCommunication
 */
class StructuredCommunicationTest extends \PHPUnit_Framework_TestCase
{

    /**
     * getValidStructuredCommunication: data Provider
     *
     * @return array
     */
    public function getValidStructuredCommunication()
    {
        return [
            [101327481006],
            ['101327481006'],
            ['123456789002']
        ];
    }

    /**
     * getValidStructuredCommunication: data Provider
     *
     * @return array
     */
    public function getInvalidStructuredCommunication()
    {
        return [
            ['12345678902'],
            [12345678902],
            [123456789020],
            [10132748100],
            [10132748107],
            [1013274810067],
            [101374810060],
            [''],
            [' '],
            [null],
        ];
    }

    /**
     * testValidStructuredCommunication
     *
     * @param mixed $structure
     *
     * @dataProvider getValidStructuredCommunication
     *
     * @return void
     */
    public function testValidStructuredCommunication($structure)
    {
        $this->assertTrue(StructuredCommunication::validate($structure));
    }

    /**
     * testInvalidStructuredCommunication
     *
     * @param mixed $structure
     *
     * @dataProvider getInvalidStructuredCommunication
     *
     * @return void
     */
    public function testInvalidStructuredCommunication($structure)
    {
        $this->assertFalse(StructuredCommunication::validate($structure));
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
