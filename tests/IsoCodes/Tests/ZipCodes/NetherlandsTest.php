<?php

namespace IsoCodes\Tests\ZipCodes;

use IsoCodes\ZipCode;

class NetherlandsTest extends \PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
        parent::setUp();
    }

    /**
     * testNetherlandsZipCode
     *
     * @dataProvider zipCodes
     *
     * @param mixed $code
     * @param string $country
     * @param bool $result
     * @return void
     */
    public function testNetherlandsZipCode($code, $country, $result)
    {
        $this->assertEquals( ZipCode::validate( $code, $country), $result );
    }

    /**
     * zipCodes: dataProvider
     *
     * @return array
     */
    public function zipCodes()
    {
        return array(
            // bad:
            array( '1234',       'Netherlands', false ),
            array( '1234A',      'Netherlands', false ),
            array( 'AA1234',     'Netherlands', false ),
            array( 'A1234A',     'Netherlands', false ),
            array( '1A2A3A',     'Netherlands', false ),
            array( '1234ABC',    'Netherlands', false ),
            array( '123AB',      'Netherlands', false ),
            array( '123456',     'Netherlands', false ),
            array( 'AAAA',       'Netherlands', false ),
            array( 'ABCD12',     'Netherlands', false ),
            array( '1234 ABC',   'Netherlands', false ),
            array( '12345A',     'Netherlands', false ),
            array( '1234 5A',    'Netherlands', false ),
            array( '0123 AA',    'Netherlands', false ), // Zipcodes cannot start with 0
            array( '1234aa',     'Netherlands' , false ),

            // good:
            array( '1234AA',     'Netherlands' , true ),
            array( '1234 AA',    'Netherlands' , true ), // Some people add a space
            array( '1023 AA',    'Netherlands', true ),
        );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testEmptyZipCodeAsInvalid()
    {
        $this->assertEquals( ZipCode::validate( '', 'Netherlands' ), false );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testBlankZipCodeAsInvalid()
    {
        $this->assertEquals( ZipCode::validate( ' ', 'Netherlands' ), false );
    }

}
