<?php

namespace IsoCodes\Tests;

use IsoCodes\Siren;

/**
 * SirenTest
 *
 * @covers IsoCodes\Siren
 */
class SirenTest extends \PHPUnit_Framework_TestCase
{

    /**
     * getValidSirens dataProvider
     *
     * @return array
     */
    public function getValidSirens()
    {
        return [
            ['432167567'],
            [432167567],
            ['417625639'],
            ['334932720'],
            ['440288371'],
            ['517439543']
        ];
    }

    /**
     * getInvalidSirens dataProvider
     *
     * @return array
     */
    public function getInvalidSirens()
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
            [''],
            [' '],
            ['azertyuio'],
        ];
    }

    /**
     * testValidSiren
     *
     * @param mixed $siren
     *
     * @dataProvider getValidSirens
     *
     * return void
     */
    public function testValidSiren($siren)
    {
        $this->assertTrue(Siren::validate($siren));
    }

    /**
     * testInvalidSiren
     *
     * @param mixed $siren
     *
     * @dataProvider getInvalidSirens
     *
     * return void
     */
    public function testInvalidSiren($siren)
    {
        $this->assertFalse(Siren::validate($siren));
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
