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
        return array(
            array('432167567'),
            array(432167567),
            array('417625639'),
            array('334932720'),
            array('440288371'),
            array('517439543')
        );
    }

    /**
     * getInvalidSirens dataProvider
     *
     * @return array
     */
    public function getInvalidSirens()
    {
        return array(
            array('44079707'),
            array(44079707),
            array('4407970745'),
            array('440797075'),
            array('488537813'),
            array('432167568'),
            array('417625630'),
            array('334932721'),
            array('440288372'),
            array('517439544'),
            array(''),
            array(' '),
            array('azertyuio'),
        );
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
