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
        return array(
            // bad:
            array( '560',       'ES', false ),
            array( '5600',      'ES', false ),
            array( '560000',    'ES', false ),
            array( 'A56000',    'ES', false ),
            array( '56000A',    'ES', false ),
            array( 'A5600A',    'ES', false ),
            array( 'AAA',       'ES', false ),
            array( 'AAAA',      'ES', false ),
            array( 'A 0A1A0',   'ES', false ),
            array( 'A0 A1A0',   'ES', false ),
            array( 'A0A1 A0',   'ES', false ),
            array( 'A0A1A 0',   'ES', false ),
            array( 'A0A1a0',    'ES', false ),
            array( 'a0a1a0',    'ES', false ),
            // good:
            array( '03099',     'ES' , true ),
            array( '03201',     'ES' , true ),
            array( '29640',     'ES', true ),
            array( null,        'ES', false ),
            array( '',          'ES', false ),
            array( '  ',        'ES', false ),
        );
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
