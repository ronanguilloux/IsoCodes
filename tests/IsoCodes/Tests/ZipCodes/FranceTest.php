<?php

namespace IsoCodes\Tests\ZipCodes;

use IsoCodes\ZipCode;

/**
 * Class FranceTest
 *
 * @package IsoCodes\Tests\ZipCodes
 */
class FranceTest extends \PHPUnit_Framework_TestCase
{

    /**
     * zipCodes: data provider
     *
     * @return array
     */
    public function zipCodes()
    {
        return array(
            //good:
            array( '06000',     'FR', true ),
            array( '56000',     'FR', true ),
            array( '56420',     'FR', true ),
            array( '20000',     'FR', true ), // Ajaccio: ZIP code (20000,20090) is not an INSEE code
            array( '97114',     'FR', true ), // 971 - 14, Trois-Rivières, Guadeloupe
            array( '99999',     'FR', true ), // Service consommateurs
            array( '99123',     'FR', true ), // Paris - Concours
            array( '98000',     'FR', true ), // Monaco
            array( '00100',     'FR', true ), // Armée
            array( '01000',     'FR', true ),
            array( '01000',     'FR', true ),
            array( '01000',     'FR', true ),
            //bad:
            array( '2A004',     'FR', false ), // Ajaccio: INSEE code (2A004) is not a ZIP code (20000,20090)
            array( '560',       'FR', false ),
            array( '5600',      'FR', false ),
            array( '560000',    'FR', false ),
            array( 'A56000',    'FR', false ),
            array( 'A5600',     'FR', false ),
            array( '56000A',    'FR', false ),
            array( 'A5600A',    'FR', false ),
            array( 'AAA',       'FR', false ),
            array( 'AAAA',      'FR', false ),
            array( 'AAAAA',     'FR', false ),
            array( null,        'FR', false ),
            array( '',          'FR', false ),
            array( '  ',        'FR', false ),
        );
    }

    /**
     * testFrenchZipCode
     *
     * @param mixed $zipcode
     * @param mixed $country
     * @param mixed $result
     *
     * @dataProvider zipCodes
     *
     * @return void
     */
    public function testFrenchZipCode($zipcode, $country, $result)
    {
        $this->assertEquals(ZipCode::validate($zipcode, $country), $result);
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
