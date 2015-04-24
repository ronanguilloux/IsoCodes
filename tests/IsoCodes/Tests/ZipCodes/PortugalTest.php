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
            array( '560',       'Portugal', false ),
            array( '5600',      'Portugal', false ),
            array( '560000',    'Portugal', false ),
            array( 'A56000',    'Portugal', false ),
            array( 'A5600',     'Portugal', false ),
            array( '56000A',    'Portugal', false ),
            array( 'A5600A',    'Portugal', false ),
            array( 'AAA',       'Portugal', false ),
            array( 'AAAA',      'Portugal', false ),
            array( 'AAAAA',     'Portugal', false ),
            array( 'A 0A1A0',   'Portugal', false ),
            array( 'A0 A1A0',   'Portugal', false ),
            array( 'A0A1 A0',   'Portugal', false ),
            array( 'A0A1A 0',   'Portugal', false ),
            array( 'A0A1a0',    'Portugal', false ),
            array( 'a0a1a0',    'Portugal', false ),
            // good:
            array( '1000-001',   'Portugal' , true ),
            array( '1900-078',    'Portugal' , true ),
            array( '1250-789',   'Portugal', true ),

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
     * @expectedException \InvalidArgumentException
     */
    public function testEmptyZipCodeAsInvalid()
    {
        $this->assertEquals(ZipCode::validate('', 'Portugal'), false);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testBlankZipCodeAsInvalid()
    {
        $this->assertEquals(ZipCode::validate(' ', 'Portugal'), false);
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
