<?php

namespace IsoCodes\Tests;

/**
 * Class GridTest.
 *
 * @covers \IsoCodes\Grid
 */
class GridTest extends AbstractIsoCodeInterfaceTest
{
    public static function getValidValues()
    {
        return [
            ['A12425GABC1234002M'], // Wikipedia example
        ];
    }

    public static function getInvalidValues()
    {
        return [
            ['A12425GABC1234002X'], // Invalid check digit
            ['A12425GABC123400MM'], // Too long? No same length but wrong content
            ['A12425GABC1234002'],  // Too short
            ['A12425GABC1234002MM'], // Too long
            ['000000000000000000'], // Invalid content
            ['A12425GABC12340020'], // Zero at end
        ];
    }
}
