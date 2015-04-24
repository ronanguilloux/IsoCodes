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
        return array(
            array(44079707400026),
            array('48853781200015'),
            array('43216756700028'),
            array('41762563900030'),
            array('33493272000017'),
            array('44028837100014'),
            array('51743954300011')
        );
    }

    /**
     * getInvalidSirets dataProvider
     *
     * @return array
     */
    public function getInvalidSirets()
    {
        return array(
            array(440797074000),
            array('440797074000278'),
            array('44079707400027'),
            array('48853781200016'),
            array('43216756700029'),
            array('41762563900031'),
            array('33493272000018'),
            array('44028837100015'),
            array('51743954300012'),
            array(''),
            array(' '),
            array('azertyuiopqsdf')
        );
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
