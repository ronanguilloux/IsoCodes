<?php

namespace IsoCodes\Tests;

/**
 * HetuTest.
 *
 * @covers \Isocodes\Hetu
 */
class HetuTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['190402A6222'],
            ['090501A6867'],
            ['100423-6386'],
            ['060654+5424'],
            ['111123-6861'],
            ['040795-679M'],
            ['231040-507K'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['190402A6221'],
            ['090501A68'],
            ['100423-638A'],
            ['060654-542C'],
            ['111123A6862'],
            ['040795-679ML'],
            ['AAAAAAAAAAA'],
            ['231040|507K'],
        ];
    }
}
