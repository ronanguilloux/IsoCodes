<?php

namespace IsoCodes\Tests;

/**
 * Class IsrcTest.
 *
 * @covers \IsoCodes\Isrc
 */
class IsrcTest extends AbstractIsoCodeInterfaceTest
{
    public static function getValidValues()
    {
        return [
            ['US-PR3-73-00012'], // Examples from Wikipedia
            ['USPR37300012'],
            ['UK-A34-01-23456'],
            ['UKA340123456'],
            ['US-QX9-13-00105'], // "Instant Crush" by Daft Punk featuring Julian Casablancas, Columbia Records, 2013, Album Version (5:37)
        ];
    }

    public static function getInvalidValues()
    {
        return [
            ['US-PR3-73-0001'], // Too short (4 digits at end)
            ['1S-PR3-73-00012'], // Country code starts with number
            ['US-PR3-73-0001A'], // Designation contains letter
            ['US-PR3-7A-00012'], // Year contains letter
        ];
    }
}
