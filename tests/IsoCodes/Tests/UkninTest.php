<?php

namespace IsoCodes\Tests;

/**
 * Class UkninTest.
 *
 * @covers \IsoCodes\Uknin
 */
class UkninTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['AB123456C'],
            ['EH123456A'],
            ['HG123456B'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['AD123456CA'],
            ['AD12345C'],
            ['AD123456'],
            ['AF123456C'],
            ['AB123456F'],
            ['TN011258F'],
            ['azertyuiop'],
        ];
    }
}
