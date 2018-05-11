<?php

namespace IsoCodes\Tests;

/**
 * IsanTest
 *
 * @covers Isocodes\Isan
 * @group isan
 */
class IsanTest extends AbstractIsoCodeInterfaceTest
{

    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['ISAN B159-D8FA-0124-0000-K'],
            ['ISAN B159 D8FA 0124 0000 K'],
            ['ISAN 0000-0004-C9C0-0000-9'],
            ['ISAN 0000-0004-687C-0106-8'],
            ['ISAN 0000-0003-F163-0001-H'],
            ['ISAN 0000-0003-EFC8-0000-B'],
            ['ISAN 0000-0003-4EE3-0025-W'],
            ['ISAN 0000-0003-A668-0000-I'],
            ['ISAN 0000-0003-C3FA-0009-9'],
            ['ISAN 0000-0001-88E9-0000-O'],
            ['ISAN 0000-0001-46C4-0000-S'],
            ['ISAN 0000-0002-79CF-0288-8'],
            //['ISAN 0000-0004-C9C0-0000-9-0000-0000-A']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['B159-D8FA-0124-0000-K'],
            ['ISAN B159.D8FA.0124.0000.K'],
            ['ISAN B159-D8FA-0124-0000-L'],
        ];
    }
}
