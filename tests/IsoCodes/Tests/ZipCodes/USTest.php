<?php

namespace IsoCodes\Tests\ZipCodes;

use IsoCodes\ZipCode;

/**
 * Class USTest
 *
 * @package IsoCodes\Tests\ZipCodes
 */
class USTest extends \PHPUnit_Framework_TestCase
{

    /**
     * zipCodes: dataProvider
     *
     * @return array
     */
    public function zipCodes()
    {
        return [
            //good:
            ['99801',      'US', true], // Juneau, Alaska
            ['02115',      'US', true], // Boston
            ['10001',      'US', true], // New York City
            ['20008',      'US', true], // Washington, D.C.
            ['99950',      'US', true], // Ketchikan, Alaska (the highest ZIP code)
            //bad:
            ['5600',       'US', false],
            ['560000',     'US', false],
            ['A56000',     'US', false],
            ['A5600',      'US', false],
            ['56000A',     'US', false],
            ['A5600A',     'US', false],
            ['AAA',        'US', false],
            ['AAAA',       'US', false],
            ['AAAAA',      'US', false],
            ['A 0A1A0',    'US', false],
            ['A0 A1A0',    'US', false],
            ['A0A1 A0',    'US', false],
            ['A0A1A 0',    'US', false],
            ['A0A1a0',     'US', false],
            ['a0a1a0',     'US', false],
            [null,        'US', false],
            ['',          'US', false],
            ['  ',        'US', false],
        ];
    }

    /**
     * testUSZipCode
     *
     * @param mixed  $code
     * @param string $country
     * @param bool   $result
     *
     * @dataProvider zipCodes
     *
     * @return void
     */
    public function testUSZipCode($code, $country, $result)
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
