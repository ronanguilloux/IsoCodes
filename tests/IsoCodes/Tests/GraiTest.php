<?php

namespace IsoCodes\Tests;

/**
 * GraiTest
 *
 * @group grai
 * @covers Isocodes\Grai
 */
class GraiTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['04719512002889 1234567890 12345A'], // valid GTIN13 + valid random optional alphanum serial number
            ['04719512002889-1234567890-123456'], // hyphens are OK (dash)
            ['04719512002889 1234567890 123456'], // hyphens are OK (space)
            ['012345678900051234AX01'], // 50 litre aluminium beer keg + valid random optional alphanum serial number
            ['012345678900051234AX02'], // 50 litre aluminium beer keg + valid random optional alphanum serial number
            ['012345678900051234AX02'], // 50 litre aluminium beer keg + valid random optional alphanum serial number
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['0000000000000 1234567890 12345A'], // 13 zeros + valid random optional alphanum serial number
            [4719512002881234567890123456], // same, but integer
            ['04719512002888-1234567890-123456'], // bad checksum digit
            ['04719512002889.1234567890.123456'],  // dot hyphens are not OK.
            ['0471951200288-1234567890-12345;'], // invalid non-alphanum serial number
        ];
    }
}
