<?php

namespace IsoCodes\Tests\ZipCodes;

use IsoCodes\ZipCode;

/**
 * Class PortugalTest
 *
 * @package IsoCodes\Tests\ZipCodes
 */
class PortugalTest extends \PHPUnit_Framework_TestCase
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
            ['560',       'Portugal', false],
            ['5600',      'Portugal', false],
            ['560000',    'Portugal', false],
            ['A56000',    'Portugal', false],
            ['A5600',     'Portugal', false],
            ['56000A',    'Portugal', false],
            ['A5600A',    'Portugal', false],
            ['AAA',       'Portugal', false],
            ['AAAA',      'Portugal', false],
            ['AAAAA',     'Portugal', false],
            ['A 0A1A0',   'Portugal', false],
            ['A0 A1A0',   'Portugal', false],
            ['A0A1 A0',   'Portugal', false],
            ['A0A1A 0',   'Portugal', false],
            ['A0A1a0',    'Portugal', false],
            ['a0a1a0',    'Portugal', false],
            // good:
            ['1000-001',   'Portugal' , true],
            ['1900-078',   'Portugal' , true],
            ['1250-789',   'Portugal', true],
            [null,         'Portugal', false],
            ['',           'Portugal', false],
            ['  ',         'Portugal', false],
        ];
    }

    /**
     * testPortugueseZipCode
     *
     * @param mixed  $code
     * @param string $country
     * @param bool   $result
     *
     * @dataProvider zipCodes
     *
     * @return void
     */
    public function testPortugueseZipCode($code, $country, $result)
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
