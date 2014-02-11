<?php

namespace IsoCodes\Tests;

use IsoCodes\Ean13;

/**
 * @covers Isocodes\Ean13
 */
class Ean13Test extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    /**
     * getEan13: data provider
     *
     * @return array
     */
    public function getEan13()
    {
        return array(
            //good:
            array( '4719512002889', true ), // Source: Wikipedia
            array( '9782868890061', true ), // Source: Wikipedia
            array( '4006381333931', true ), // Stabilo Point 88 Art. No. 88/57
            //bad:
            array( 4006381333931, false ), // not a string
            array( 2266111566, false ), // not 13 chars found
            array( '2266111566', false ), // not 13 chars found
            array( 'A782868890061', false ), // not numeric-only
            array( '4006381333932', false ), // bad checksum digit
            array( '', false ),
            array( ' ', false ),
        );
    }

    /**
     * testEan13
     *
     * @dataProvider getEan13
     *
     * @param mixed $ean13
     * @param bool $result
     *
     * @return void
     */
    public function testEan13($ean13, $result)
    {
        $this->assertEquals( Ean13::validate( $ean13 ), $result );
    }
}
