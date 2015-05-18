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
        return array(
            // bad:
            array( '1234',       'NL', false ),
            array( '1234A',      'NL', false ),
            array( 'AA1234',     'NL', false ),
            array( 'A1234A',     'NL', false ),
            array( '1A2A3A',     'NL', false ),
            array( '1234ABC',    'NL', false ),
            array( '123AB',      'NL', false ),
            array( '123456',     'NL', false ),
            array( 'AAAA',       'NL', false ),
            array( 'ABCD12',     'NL', false ),
            array( '1234 ABC',   'NL', false ),
            array( '12345A',     'NL', false ),
            array( '1234 5A',    'NL', false ),
            array( '0123 AA',    'NL', false ), // Zipcodes cannot start with 0
            array( '1234aa',     'NL', false ),

            // good:
            array( '1234AA',     'NL', true ),
            array( '1234 AA',    'NL', true ), // Some people add a space
            array( '1023 AA',    'NL', true ),
            array( null,         'NL', false ),
            array( '',           'NL', false ),
            array( '  ',         'NL', false ),
        );
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
