<?php

namespace IsoCodes\Tests\PhoneNumbers;

use IsoCodes\PhoneNumber;

/**
 * Class FRTest.
 */
class FRTest extends \PHPUnit_Framework_TestCase
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
            array('0123456789', 'FR', true),
            // Country code have to be given
            array('0123456789', null, false),
            // Too long phone number (catch exception)
            array(implode('', range(0, 200)), null, false),
        );
    }

    /**
     * testFRPhoneNumber.
     *
     * @param mixed  $code
     * @param string $country
     * @param bool   $result
     *
     * @dataProvider phoneNumbers
     */
    public function testFRPhoneNumber($code, $country, $result)
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
