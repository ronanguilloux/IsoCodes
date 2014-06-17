<?php

namespace IsoCodes\Tests\ZipCodes;

use IsoCodes\ZipCode;

class FranceTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    /**
     * getZipcodes: data provider
     *
     * @return array
     */
    public function getZipcodes()
    {
        return array(
            //good:
            array( '06000',     'France', true ),
            array( '56000',     'France', true ),
            array( '56420',     'France', true ),
            array( '20000',     'France', true ), // Ajaccio: ZIP code (20000,20090) is not an INSEE code
            array( '97114',     'France', true ), // 971 - 14, Trois-Rivières, Guadeloupe
            array( '99999',     'France', true ), // Service consommateurs
            array( '99123',     'France', true ), // Paris - Concours
            array( '98000',     'France', true ), // Monaco
            array( '00100',     'France', true ), // Armée
            array( '01000',     'France', true ),
            array( '01000',     'france', true ),
            array( '01000',     'FRANCE', true ),
            //bad:
            array( '2A004',     'France', false ), // Ajaccio: INSEE code (2A004) is not a ZIP code (20000,20090)
            array( '560',       'France', false ),
            array( '5600',      'France', false ),
            array( '560000',    'France', false ),
            array( 'A56000',    'France', false ),
            array( 'A5600',     'France', false ),
            array( '56000A',    'France', false ),
            array( 'A5600A',    'France', false ),
            array( 'AAA',       'France', false ),
            array( 'AAAA',      'France', false ),
            array( 'AAAAA',     'France', false )
        );
    }

    /**
     * testFrenchZipCode
     *
     * @dataProvider getZipcodes
     *
     * @param mixed $zipcode
     * @param mixed $country
     * @param mixed $result
     * @return void
     */
    public function testFrenchZipCode($zipcode, $country, $result)
    {
        $this->assertEquals( ZipCode::validate( $zipcode, $country), $result );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testZipCodeExceptionsIfEmpty()
    {
        $this->assertEquals( ZipCode::validate( '', 'France' ), false );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testZipCodeExceptionsIfSpace()
    {
        $this->assertEquals( ZipCode::validate( ' ', 'France' ), false );
    }
}
