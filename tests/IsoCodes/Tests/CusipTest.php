<?php

namespace IsoCodes\Tests;

/**
 * Class CusipTest.
 *
 * @covers \IsoCodes\Cusip
 */
class CusipTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['037833100'], // Apple Inc.
            ['17275R102'], // Cisco Systems:
            ['38259P508'], // Google Inc.
            ['68389X105'], // Oracle Corp.
            ['000847400'], // DWS INVESTA Fonds Kurs
            ['594918104'], // Microsoft
            ['98986T108'], // Zynga Inc.
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['037833101'],
        ];
    }
}
