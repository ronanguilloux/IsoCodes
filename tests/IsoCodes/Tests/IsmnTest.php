<?php

namespace IsoCodes\Tests;

/**
 * Class IsmnTest.
 *
 * @covers \IsoCodes\Ismn
 */
class IsmnTest extends AbstractIsoCodeInterfaceTest
{
    public static function getValidValues()
    {
        return [
            ['979-0-2600-0043-8'],  // Wikipedia
            ['979-0-060-11561-5'],  // Wikipedia
            ['979-0-9016791-7-7'],  // Wikipedia
            ['979-0-006-44431-1'],  // Bärenreiter - Beethoven: Symphony No. 5 (Full Score)
            ['979-0-060-02591-4'],  // Boosey & Hawkes - Stravinsky: The Rite of Spring
            ['979-0-004-16201-9'],  // Breitkopf & Härtel - Mozart: Requiem KV 626 (Vocal Score)
            ['979-0-001-13239-8'],  // Howard Shore: The Lord of the Rings (The Fellowship of the Ring)
            ['9 790230 671187'],    // http://www.ismn-international.org/whatis.html
        ];
    }

    public static function getInvalidValues()
    {
        return [
            [0000000000000],       // 13 zeros only
            ['000-0-0000-0000-0'],     // string containing 13 zeros
            ['979-0-060-11561-4'],  // bad check digit
            ['979-0-9016791-5'],    // missing digit
            ['979.0.9016791.7.7'],  // bad dot hyphen
        ];
    }
}
