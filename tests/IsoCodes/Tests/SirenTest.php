<?php

namespace IsoCodes\Tests;

/**
 * Class SirenTest.
 *
 * @covers \IsoCodes\Siren
 */
class SirenTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['432167567'],
            [432167567],
            ['417625639'],
            ['334932720'],
            ['440288371'],
            ['517439543'],
            ['356000000'],  // La Poste
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['44079707'],
            [44079707],
            ['4407970745'],
            ['440797075'],
            ['488537813'],
            ['432167568'],
            ['417625630'],
            ['334932721'],
            ['440288372'],
            ['517439544'],
            ['azertyuio'],
        ];
    }
}
