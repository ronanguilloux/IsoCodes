<?php

namespace IsoCodes\Tests;

use IsoCodes\Udi;

/**
 * UdiTest
 *
 * @covers Isocodes\Udi
 */
class UdiTest extends \PHPUnit_Framework_TestCase
{
    /**
     * getValidUdi: data provider
     *
     * @return array
     */
    public function getValidUdi()
    {
        return [
            ['07610221010301'],  // https://accessgudid.nlm.nih.gov/devices/07610221010301
            ['10887488125541'],  // https://accessgudid.nlm.nih.gov/devices/10887488125541
            ['00868866000011'],  // https://accessgudid.nlm.nih.gov/devices/00868866000011
            ['1038178 0064596'],  // https://accessgudid.nlm.nih.gov/devices/10381780064596
        ];
    }

    /**
     * getInvalidUdi: data provider
     *
     * @return array
     */
    public function getInvalidUdi()
    {
        return [
            [10381780064595],       // bad checksum digit
            [1038178006459],      // not 13 chars found
            ['0761022101030'],    // not 13 chars found (string)
            ['0761022101030A'],     // not numeric-only
            ['1038178.0064596'],   // dot hyphens are not OK.
            [''],
            [' ']
        ];
    }

    /**
     * testValidUdi
     *
     * @param mixed $di
     *
     * @dataProvider getValidUdi
     *
     * @return void
     */
    public function testValidUdi($di)
    {
        $this->assertTrue(Udi::validate($di));
    }

    /**
     * testInvalidUdi
     *
     * @param mixed $di
     *
     * @dataProvider getInvalidUdi
     *
     * @return void
     */
    public function testInvalidUdi($di)
    {
        $this->assertFalse(Udi::validate($di));
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
