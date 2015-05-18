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
        return array(
            // bad:
            array( '560',       'CA', false ),
            array( '5600',      'CA', false ),
            array( '560000',    'CA', false ),
            array( 'A56000',    'CA', false ),
            array( 'A5600',     'CA', false ),
            array( '56000A',    'CA', false ),
            array( 'A5600A',    'CA', false ),
            array( 'AAA',       'CA', false ),
            array( 'AAAA',      'CA', false ),
            array( 'AAAAA',     'CA', false ),
            array( 'A 0A1A0',   'CA', false ),
            array( 'A0 A1A0',   'CA', false ),
            array( 'A0A1 A0',   'CA', false ),
            array( 'A0A1A 0',   'CA', false ),
            array( 'A0A1a0',    'CA', false ),
            array( 'a0a1a0',    'CA', false ),
            array( null,        'CA', false ),
            array( '',          'CA', false ),
            array( '  ',        'CA', false ),
            // good:
            array( 'A0A 1A0',   'CA' , true ), // Aquaforte, Avalon Peninsula, Newfoundland and Labrador
            array( 'A0A1A0',    'CA' , true ), // Some Canadian people put a space in the middle, some don't
            array( 'H0H 0H0',   'CA', true ), // North Pole (for Santa Claus only)
            // good (changing case):
            array( 'A0A 1A0',   'CA', true ),
            array( 'A0A1A0',    'CA', true ),
            array( 'A0A 1A0',   'CA', true )
        );
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
