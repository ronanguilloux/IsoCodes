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

            ['979-0-060-11561-4'],  // bad check digit
            ['979-0-9016791-5'],    // missing digit
            ['979.0.9016791.7.7'],  // bad dot hyphen
        ];
    }
}
