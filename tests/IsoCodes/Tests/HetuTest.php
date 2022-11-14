<?php

namespace IsoCodes\Tests;

/**
 * Class HetuTest.
 *
 * @covers \IsoCodes\Hetu
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
            ['010594Y9032'],
            ['010594Y9021'],
            ['020594X903P'],
            ['020594X902N'],
            ['030594W903B'],
            ['030694W9024'],
            ['040594V9030'],
            ['040594V902Y'],
            ['050594U903M'],
            ['050594U902L'],
            ['010516B903X'],
            ['010516B902W'],
            ['020516C903K'],
            ['020516C902J'],
            ['030516D9037'],
            ['030516D9026'],
            ['010501E9032'],
            ['020502E902X'],
            ['020503F9037'],
            ['020504A902E'],
            ['020504B904H'],
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
            ['020504g904h'],
        ];
    }
}
