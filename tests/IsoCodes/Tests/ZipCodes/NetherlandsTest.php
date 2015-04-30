<?php

namespace IsoCodes\Tests\ZipCodes;

use IsoCodes\ZipCode;

/**
 * Class NetherlandsTest
 *
 * @package IsoCodes\Tests\ZipCodes
 */
class NetherlandsTest extends \PHPUnit_Framework_TestCase
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
            ['1234',       'Netherlands', false],
            ['1234A',      'Netherlands', false],
            ['AA1234',     'Netherlands', false],
            ['A1234A',     'Netherlands', false],
            ['1A2A3A',     'Netherlands', false],
            ['1234ABC',    'Netherlands', false],
            ['123AB',      'Netherlands', false],
            ['123456',     'Netherlands', false],
            ['AAAA',       'Netherlands', false],
            ['ABCD12',     'Netherlands', false],
            ['1234 ABC',   'Netherlands', false],
            ['12345A',     'Netherlands', false],
            ['1234 5A',    'Netherlands', false],
            ['0123 AA',    'Netherlands', false], // Zipcodes cannot start with 0
            ['1234aa',     'Netherlands', false],

            // good:
            ['1234AA',     'Netherlands', true],
            ['1234 AA',    'Netherlands', true], // Some people add a space
            ['1023 AA',    'Netherlands', true],
            [null,         'Netherlands', false],
            ['',           'Netherlands', false],
            ['  ',         'Netherlands', false],
        ];
    }

    /**
     * testNetherlandsZipCode
     *
     * @param mixed  $code
     * @param string $country
     * @param bool   $result
     *
     * @dataProvider zipCodes
     *
     * @return void
     */
    public function testNetherlandsZipCode($code, $country, $result)
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
