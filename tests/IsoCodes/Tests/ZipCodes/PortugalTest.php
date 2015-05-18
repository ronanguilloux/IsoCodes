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
        return array(
            // bad:
            array( '560',       'PT', false ),
            array( '5600',      'PT', false ),
            array( '560000',    'PT', false ),
            array( 'A56000',    'PT', false ),
            array( 'A5600',     'PT', false ),
            array( '56000A',    'PT', false ),
            array( 'A5600A',    'PT', false ),
            array( 'AAA',       'PT', false ),
            array( 'AAAA',      'PT', false ),
            array( 'AAAAA',     'PT', false ),
            array( 'A 0A1A0',   'PT', false ),
            array( 'A0 A1A0',   'PT', false ),
            array( 'A0A1 A0',   'PT', false ),
            array( 'A0A1A 0',   'PT', false ),
            array( 'A0A1a0',    'PT', false ),
            array( 'a0a1a0',    'PT', false ),
            // good:
            array( '1000-001',   'PT' , true ),
            array( '1900-078',   'PT' , true ),
            array( '1250-789',   'PT', true ),
            array( null,         'PT', false ),
            array( '',           'PT', false ),
            array( '  ',         'PT', false ),
        );
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
