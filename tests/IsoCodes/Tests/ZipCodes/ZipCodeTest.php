<?php

namespace IsoCodes\Tests\ZipCodes;

use IsoCodes\ZipCode;

/**
 * Class ZipCodeTest
 *
 * @package IsoCodes\Tests\ZipCodes
 */
class ZipCodeTest extends \PHPUnit_Framework_TestCase
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
            array( 'A0A 1A0',   'Canada' , true ),
            array( '06000',     'France', true ),
            array( '1234AA',    'Netherlands', true ),
            array( '1000-001',  'Portugal' , true ),
            array( '03099',     'Spain' , true ),
            array( '99801',     'US', true),

            //bad:
            array( '560',       'Canada', false ),
            array( '2A004',     'France', false ),
            array( '1234',      'Netherlands', false ),
            array( '560',       'Portugal', false ),
            array( '560',       'Spain', false ),
            array( '5600',      'US', false),
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
    public function testZipCodeCountryMethod($code, $country, $result)
    {
        $methodName = "validate{$country}";
        $this->assertEquals(ZipCode::$methodName($code), $result);
    }

    /**
     * testZipCodeException
     *
     * @expectedException InvalidArgumentException
     * 
     * @return void
     */
    public function testUSZipCode()
    {
        $this->assertEquals(ZipCode::validate('ABC12', 'Unkown'), $result);
    }
    
    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
