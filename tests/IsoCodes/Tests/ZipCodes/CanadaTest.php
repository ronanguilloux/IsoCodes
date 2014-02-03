<?php

namespace IsoCodes\Tests\ZipCodes;

use IsoCodes\ZipCode;

class CanadaTest extends \PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
        parent::setUp();
    }

    /**
     * testCanadianZipCode
     *
     * @dataProvider zipCodes
     *
     * @param mixed $code
     * @param string $country
     * @param bool $result
     * @return void
     */
    public function testCanadianZipCode($code, $country, $result)
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
            array( '560',       'Canada', false ),
            array( '5600',      'Canada', false ),
            array( '560000',    'Canada', false ),
            array( 'A56000',    'Canada', false ),
            array( 'A5600',     'Canada', false ),
            array( '56000A',    'Canada', false ),
            array( 'A5600A',    'Canada', false ),
            array( 'AAA',       'Canada', false ),
            array( 'AAAA',      'Canada', false ),
            array( 'AAAAA',     'Canada', false ),
            array( 'A 0A1A0',   'Canada', false ),
            array( 'A0 A1A0',   'Canada', false ),
            array( 'A0A1 A0',   'Canada', false ),
            array( 'A0A1A 0',   'Canada', false ),
            array( 'A0A1a0',    'Canada', false ),
            array( 'a0a1a0',    'Canada', false ),
            // good:
            array( 'A0A 1A0',   'Canada' , true ), // Aquaforte, Avalon Peninsula, Newfoundland and Labrador
            array( 'A0A1A0',    'Canada' , true ), // Some Canadian people put a space in the middle, some don't
            array( 'H0H 0H0',   'Canada', true ), // North Pole (for Santa Claus only)
            // good (changing case):
            array( 'A0A 1A0',   'Canada', true ),
            array( 'A0A1A0',    'canada', true ),
            array( 'A0A 1A0',   'CANADA', true )
        );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testEmptyZipCodeAsInvalid()
    {
        $this->assertEquals( ZipCode::validate( '', 'Canada' ), false );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testBlankZipCodeAsInvalid()
    {
        $this->assertEquals( ZipCode::validate( ' ', 'Canada' ), false );
    }

}
