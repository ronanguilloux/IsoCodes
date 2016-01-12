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
