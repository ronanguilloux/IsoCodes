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
            array( '560',       'Spain', false ),
            array( '5600',      'Spain', false ),
            array( '560000',    'Spain', false ),
            array( 'A56000',    'Spain', false ),
            array( '56000A',    'Spain', false ),
            array( 'A5600A',    'Spain', false ),
            array( 'AAA',       'Spain', false ),
            array( 'AAAA',      'Spain', false ),
            array( 'A 0A1A0',   'Spain', false ),
            array( 'A0 A1A0',   'Spain', false ),
            array( 'A0A1 A0',   'Spain', false ),
            array( 'A0A1A 0',   'Spain', false ),
            array( 'A0A1a0',    'Spain', false ),
            array( 'a0a1a0',    'Spain', false ),
            // good:
            array( '03099',   'Spain' , true ),
            array( '03201',    'Spain' , true ),
            array( '29640',   'Spain', true ),

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
     * @expectedException \InvalidArgumentException
     */
    public function testEmptyZipCodeAsInvalid()
    {
        $this->assertEquals(ZipCode::validate('', 'Spain'), false);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testBlankZipCodeAsInvalid()
    {
        $this->assertEquals(ZipCode::validate(' ', 'Spain'), false);
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
