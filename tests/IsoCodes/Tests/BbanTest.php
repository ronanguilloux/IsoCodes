<?php

namespace IsoCodes\Tests;

use IsoCodes\Bban;

/**
 * @covers Isocodes\Bban
 */
class BbanTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    /**
     * getBbans: data Provider
     *
     * @return void
     */
    public function getBbans()
    {
        return array(
            //good:
            array('15459450000411700920U62',    true ),
            array('10207000260402601177083',    true ),
            //bad:
            array(10207000260402601177083,      false ),
            array('15459 45000 0411700920U 62', false ),
            array('10207000260402601177084',    false ),
            array(10207000260402601177084,      false ),
            array('',                           false ),
            array(' ',                          false ),
            array(null,                         false )
        );
    }

    /**
     * testBban
     *
     * @dataProvider getBbans
     *
     * @param mixed $bban
     * @param mixed $result
     *
     * @return void
     */
    public function testBban($bban, $result)
    {
        $this->assertEquals( Bban::validate($bban), $result );
    }
}
