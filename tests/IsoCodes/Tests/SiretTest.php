<?php

namespace IsoCodes\Tests;

use IsoCodes\Siret;

/**
 * @covers IsoCodes\Siret
 * @uses IsoCodes\Siren
 */
class SiretTest extends \PHPUnit_Framework_TestCase
{

    /**
     * getValidSirets dataProvider
     *
     * @return array
     */
    public function getValidSirets()
    {
        return [
            [44079707400026],
            ['48853781200015'],
            ['43216756700028'],
            ['41762563900030'],
            ['33493272000017'],
            ['44028837100014'],
            ['51743954300011']
        ];
    }

    /**
     * getInvalidSirets dataProvider
     *
     * @return array
     */
    public function getInvalidSirets()
    {
        return [
            [440797074000],
            ['440797074000278'],
            ['44079707400027'],
            ['48853781200016'],
            ['43216756700029'],
            ['41762563900031'],
            ['33493272000018'],
            ['44028837100015'],
            ['51743954300012'],
            [''],
            [' '],
            ['azertyuiopqsdf']
        ];
    }

    /**
     * testValidSiret
     *
     * @param mixed $siret
     *
     * @dataProvider getValidSirets
     *
     * return void
     */
    public function testValidSiret($siret)
    {
        $this->assertTrue(Siret::validate($siret));
    }

    /**
     * testInvalidSiret
     *
     * @param mixed $siret
     *
     * @dataProvider getInvalidSirets
     *
     * return void
     */
    public function testInvalidSiret($siret)
    {
        $this->assertFalse(Siret::validate($siret));
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
