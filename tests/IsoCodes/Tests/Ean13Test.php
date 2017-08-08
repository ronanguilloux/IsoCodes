<?php

namespace IsoCodes\Tests;

/**
 * Ean13Test
 *
 * @covers Isocodes\Ean13
 */
class Ean13Test extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['4719512002889'],     // Source: Wikipedia
            ['9782868890061'],     // Source: Wikipedia
            ['4006381333931'],     // Stabilo Point 88 Art. No. 88/57
            ['978-2-1234-5680-3'], // hyphens are OK (dash)
            ['4719-5120-0288-9'],  // hyphens are OK (dash)
            ['978 2 1234 5680 3'], // hyphens are OK (space
        ];
    }

    /**
     * getInvalidEan13: data provider
     *
     * @return array
     */
    public function getInvalidValues()
    {
        return [
            [0000000000000],       // 13 zeros only
            ['0000000000000'],     // string containing 13 zeros
            [2266111566],          // not 13 chars found
            ['2266111566'],        // not 13 chars found
            ['A782868890061'],     // not numeric-only
            ['4006381333932'],     // bad checksum digit
            ['4719.5120.0288.9'],  // dot hyphens are not OK.
        ];
    }
}
