<?php

namespace IsoCodes\Tests\ZipCodes;

use IsoCodes\ZipCode;

/**
 * Class CanadaTest
 *
 * @package IsoCodes\Tests\ZipCodes
 */
class CanadaTest extends \PHPUnit_Framework_TestCase
{

    /**
     * zipCodes: dataProvider
     *
     * @return array
     */
    public function zipCodes()
    {
        return [
            // bad:
            ['560',       'Canada', false],
            ['5600',      'Canada', false],
            ['560000',    'Canada', false],
            ['A56000',    'Canada', false],
            ['A5600',     'Canada', false],
            ['56000A',    'Canada', false],
            ['A5600A',    'Canada', false],
            ['AAA',       'Canada', false],
            ['AAAA',      'Canada', false],
            ['AAAAA',     'Canada', false],
            ['A 0A1A0',   'Canada', false],
            ['A0 A1A0',   'Canada', false],
            ['A0A1 A0',   'Canada', false],
            ['A0A1A 0',   'Canada', false],
            ['A0A1a0',    'Canada', false],
            ['a0a1a0',    'Canada', false],
            [null,        'Canada', false],
            ['',          'Canada', false],
            ['  ',        'Canada', false],
            // good:
            ['A0A 1A0',   'Canada' , true], // Aquaforte, Avalon Peninsula, Newfoundland and Labrador
            ['A0A1A0',    'Canada' , true], // Some Canadian people put a space in the middle, some don't
            ['H0H 0H0',   'Canada', true], // North Pole (for Santa Claus only)
            // good (changing case):
            ['A0A 1A0',   'Canada', true],
            ['A0A1A0',    'canada', true],
            ['A0A 1A0',   'CANADA', true]
        ];
    }

    /**
     * testCanadianZipCode
     *
     * @param mixed  $code
     * @param string $country
     * @param bool   $result
     *
     * @dataProvider zipCodes
     *
     * @return void
     */
    public function testCanadianZipCode($code, $country, $result)
    {
        $this->assertEquals(ZipCode::validate($code, $country), $result);
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
