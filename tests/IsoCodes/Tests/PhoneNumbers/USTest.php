<?php

namespace IsoCodes\Tests\PhoneNumbers;

use IsoCodes\PhoneNumber;

/**
 * Class USTest.
 */
class USTest extends \PHPUnit_Framework_TestCase
{
    /**
     * phoneNumbers: dataProvider.
     *
     * @return array
     */
    public function phoneNumbers()
    {
        return array(
            //good:
            array('+1-650-798-2800',    'US', true), // Apple Store, Palo Alto, CA
            array('1-650-798-2800',     'US', true),
            array('+1 650-798-2800',    'US', true),
            array('1 650-798-2800',     'US', true),
            array('650-798-2800',       'US', true),
            array('(650)798-2800',      'US', true),
            array('(650) 798-2800',     'US', true),
            array('16507982800',        'US', true),
            array('+1 650 798 2800',    'US', true),
            array('1 650 798 2800',     'US', true),
            array('650 798 2800',       'US', true),
            array('+1.650.798.2800',    'US', true),
            array('1.650.798.2800',     'US', true),
            array('650.798.2800',       'US', true),
            array('+16507982800',       'US', true),
            array('16507982800',        'us', true),
        );
    }

    /**
     * testUSPhoneNumber.
     *
     * @param mixed  $code
     * @param string $country
     * @param bool   $result
     *
     * @dataProvider phoneNumbers
     */
    public function testUSPhoneNumber($code, $country, $result)
    {
        $this->assertEquals(PhoneNumber::validate($code, $country), $result);
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
