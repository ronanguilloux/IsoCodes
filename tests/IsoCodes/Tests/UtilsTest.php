<?php

namespace IsoCodes\Tests;

use IsoCodes\Utils;
use PHPUnit\Framework\TestCase;

class UtilsTest extends TestCase
{
    public function testLuhnWithWeights(): void
    {
        // Test existing functionality (if it worked)
        // Let's assume a dummy example where weights and divider match a simple sum

        // ISSN example: 0378-5955
        // 0*8 + 3*7 + 7*6 + 8*5 + 5*4 + 9*3 + 5*2 = 0 + 21 + 42 + 40 + 20 + 27 + 10 = 160
        // 160 % 11 = 6
        // 11 - 6 = 5.
        // So this should return true.
        $this->assertTrue(Utils::luhnWithWeights('0378-5955', 8, [8, 7, 6, 5, 4, 3, 2], 11, ['-']));

        // Test with X
        // 2434-561X
        // 2*8 + 4*7 + 3*6 + 4*5 + 5*4 + 6*3 + 1*2 = 16 + 28 + 18 + 20 + 20 + 18 + 2 = 122
        // 122 % 11 = 1
        // 11 - 1 = 10 -> X
        $this->assertTrue(Utils::luhnWithWeights('2434-561X', 8, [8, 7, 6, 5, 4, 3, 2], 11, ['-']));

        // Test remainder 0 case
        // Let's construct one.
        // If sum % 11 == 0, check digit should be 0.
        // Weights: 8, 7, 6, 5, 4, 3, 2
        // Digits: 1, 0, 0, 0, 0, 0, 0 -> Sum = 8.
        // We need Sum % 11 = 0.
        // Let's try to find a valid ISSN with 0 check digit.
        // 1234-5679 (from my head) -> 1*8 + 2*7...
        // Let's use 9771144875007 (EAN13) but for ISSN usually 8 digits.

        // 1476-4687 : 1*8 + 4*7 + 7*6 + 6*5 + 4*4 + 6*3 + 8*2 = 8+28+42+30+16+18+16 = 158. 158%11 = 4. 11-4=7. Correct.

        // Need one with remainder 0.
        // 1626-3062 ?
        // 1*8 + 6*7 + 2*6 + 6*5 + 3*4 + 0*3 + 6*2 = 8 + 42 + 12 + 30 + 12 + 0 + 12 = 116. 116%11 = 6.

        // Let's force it.
        // 1111-111X -> 1*(8+7+6+5+4+3+2) = 1*35 = 35. 35%11 = 2. 11-2=9.

        // 0000-0000 -> Sum 0. 0%11 = 0. Check digit 0.
        $this->assertTrue(Utils::luhnWithWeights('0000-0000', 8, [8, 7, 6, 5, 4, 3, 2], 11, ['-']));
    }
}
