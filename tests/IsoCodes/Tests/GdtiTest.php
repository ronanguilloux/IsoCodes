<?php

namespace IsoCodes\Tests;

/**
 * GdtiTest
 *
 * @covers Isocodes\Gdti
 */
class GdtiTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['4719512002889 1234567890 123456'], // valid GTIN13 + valid random optional serial number
            ['4719512002889-1234567890-123456'], // hyphens are OK (dash)
            ['4719512002889 1234567890 123456'], // hyphens are OK (space)
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['0000000000000 1234567890 123456'], // string containing 13 zeros + valid random optional serial number
            ['471951200288-1234567890-123456'],// not 13 chars found in GTIN13 component
            [4719512002881234567890123456], // same, but integer
            ['4719512002888-1234567890-123456'], // bad checksum digit
            ['4719512002889.1234567890.123456'],  // dot hyphens are not OK.
        ];
    }
}
