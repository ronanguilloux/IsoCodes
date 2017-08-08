<?php

namespace IsoCodes\Tests;

/**
 * IsmnTest
 *
 * @covers IsoCodes\Ismn
 */
class IsmnTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['979-0-2600-0043-8'],  // Wikipedia
            ['979-0-060-11561-5'],  // Wikipedia
            ['979-0-9016791-7-7'],  // Wikipedia
            ['9 790230 671187'],    // http://www.ismn-international.org/whatis.html
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
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
