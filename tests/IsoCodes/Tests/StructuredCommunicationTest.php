<?php

namespace IsoCodes\Tests;

/**
 * StructuredCommunicationTest
 *
 * @covers Isocodes\StructuredCommunication
 */
class StructuredCommunicationTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return array(
            array(101327481006),
            array('101327481006'),
            array('123456789002')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return array(
            array('12345678902'),
            array(12345678902),
            array(123456789020),
            array(10132748100),
            array(10132748107),
            array(1013274810067),
            array(101374810060),
        );
    }
}
