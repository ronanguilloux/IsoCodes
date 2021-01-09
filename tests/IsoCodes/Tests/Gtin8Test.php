<?php

namespace IsoCodes\Tests;

/**
 * Class Gtin8Test.
 *
 * @covers \IsoCodes\Gtin8
 */
class Gtin8Test extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['42345671'],  // vi.Wikipedia
            ['4719-5127'], // fr.Wikipedia
            ['9638-5074'], // en.Wikipedia
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            [00000000],       // zeros only
            ['00000000'],     // string containing all zeros
            [42345670],       // bad checksum digit
            [423456712],        // not 8 chars found
            ['423456712'],      // not 8 chars found
            ['12345671'],     // not numeric-only
            ['4234.5671'],   // dot hyphens are not OK.
        ];
    }
}
