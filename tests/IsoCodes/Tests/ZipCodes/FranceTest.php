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
        return [
            //good:
            ['06000',     'France', true],
            ['56000',     'France', true],
            ['56420',     'France', true],
            ['20000',     'France', true], // Ajaccio: ZIP code (20000,20090) is not an INSEE code
            ['97114',     'France', true], // 971 - 14, Trois-Rivières, Guadeloupe
            ['99999',     'France', true], // Service consommateurs
            ['99123',     'France', true], // Paris - Concours
            ['98000',     'France', true], // Monaco
            ['00100',     'France', true], // Armée
            ['01000',     'France', true],
            ['01000',     'france', true],
            ['01000',     'FRANCE', true],
            //bad:
            ['2A004',     'France', false], // Ajaccio: INSEE code (2A004) is not a ZIP code (20000,20090)
            ['560',       'France', false],
            ['5600',      'France', false],
            ['560000',    'France', false],
            ['A56000',    'France', false],
            ['A5600',     'France', false],
            ['56000A',    'France', false],
            ['A5600A',    'France', false],
            ['AAA',       'France', false],
            ['AAAA',      'France', false],
            ['AAAAA',     'France', false],
            [null,        'France', false],
            ['',          'France', false],
            ['  ',        'France', false],
        ];
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
