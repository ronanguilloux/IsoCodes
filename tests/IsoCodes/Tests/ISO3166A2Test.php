<?php

namespace IsoCodes\Tests;

/**
 * Class ISO3166A2.
 *
 * @covers \IsoCodes\ISO3166A2
 */
class ISO3166A2Test extends AbstractIsoCodeTest
{
    public function getValidValues()
    {
        return [
            ['US'],
            ['DE'],
            ['NL'],
        ];
    }

    public function getInvalidValues()
    {
        return [
            ['ZZ'],      // Value doesn't exist
            ['ZZZ'],     // Value too long
            [123],        // No string
        ];
    }
}
