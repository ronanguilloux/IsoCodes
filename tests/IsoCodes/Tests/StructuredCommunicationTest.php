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
        return array(
            array(101327481006),
            array('101327481006'),
            array('123456789002')
        );
    }

    /**
     * getValidStructuredCommunication: data Provider
     *
     * @return array
     */
    public function getInvalidStructuredCommunication()
    {
        return array(
            array('12345678902'),
            array(12345678902),
            array(123456789020),
            array(10132748100),
            array(10132748107),
            array(1013274810067),
            array(101374810060),
            array(''),
            array(' '),
            array(null),
        );
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
