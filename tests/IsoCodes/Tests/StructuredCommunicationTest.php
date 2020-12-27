<?php

namespace IsoCodes\Tests;

/**
 * Class StructuredCommunicationTest.
 *
 * @covers \IsoCodes\StructuredCommunication
 */
class StructuredCommunicationTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            [101327481006],
            ['101327481006'],
            ['123456789002'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['12345678902'],
            [12345678902],
            [123456789020],
            [10132748100],
            [10132748107],
            [1013274810067],
            [101374810060],
        ];
    }
}
