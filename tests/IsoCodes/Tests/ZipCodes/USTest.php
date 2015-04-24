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
        return array(
            //good:
            array('99801',      'US', true), // Juneau, Alaska
            array('02115',      'US', true), // Boston
            array('10001',      'US', true), // New York City
            array('20008',      'US', true), // Washington, D.C.
            array('99950',      'US', true), // Ketchikan, Alaska (the highest ZIP code)
            //bad:
            array('5600',       'US', false),
            array('560000',     'US', false),
            array('A56000',     'US', false),
            array('A5600',      'US', false),
            array('56000A',     'US', false),
            array('A5600A',     'US', false),
            array('AAA',        'US', false),
            array('AAAA',       'US', false),
            array('AAAAA',      'US', false),
            array('A 0A1A0',    'US', false),
            array('A0 A1A0',    'US', false),
            array('A0A1 A0',    'US', false),
            array('A0A1A 0',    'US', false),
            array('A0A1a0',     'US', false),
            array('a0a1a0',     'US', false),
            array( null,        'US', false ),
            array( '',          'US', false ),
            array( '  ',        'US', false ),
        );
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
