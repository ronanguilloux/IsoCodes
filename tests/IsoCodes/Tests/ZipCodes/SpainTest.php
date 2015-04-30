<?php

namespace IsoCodes\Tests\ZipCodes;

use IsoCodes\ZipCode;

/**
 * Class SpainTest
 *
 * @package IsoCodes\Tests\ZipCodes
 */
class SpainTest extends \PHPUnit_Framework_TestCase
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
            ['560',       'Spain', false],
            ['5600',      'Spain', false],
            ['560000',    'Spain', false],
            ['A56000',    'Spain', false],
            ['56000A',    'Spain', false],
            ['A5600A',    'Spain', false],
            ['AAA',       'Spain', false],
            ['AAAA',      'Spain', false],
            ['A 0A1A0',   'Spain', false],
            ['A0 A1A0',   'Spain', false],
            ['A0A1 A0',   'Spain', false],
            ['A0A1A 0',   'Spain', false],
            ['A0A1a0',    'Spain', false],
            ['a0a1a0',    'Spain', false],
            // good:
            ['03099',     'Spain' , true],
            ['03201',     'Spain' , true],
            ['29640',     'Spain', true],
            [null,        'Spain', false],
            ['',          'Spain', false],
            ['  ',        'Spain', false],
        ];
    }

    /**
     * testSpanishZipCode
     *
     * @param mixed  $code
     * @param string $country
     * @param bool   $result
     *
     * @dataProvider zipCodes
     *
     * @return void
     */
    public function testSpanishZipCode($code, $country, $result)
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
