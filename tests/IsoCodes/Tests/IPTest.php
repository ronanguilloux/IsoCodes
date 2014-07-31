<?php

namespace IsoCodes\Tests;

use IsoCodes\IP;

/**
 * IPTest
 *
 * @covers IsoCodes\IP
 */
class IPTest extends \PHPUnit_Framework_TestCase
{
    /**
     * getValidIPV4s: data Provider
     *
     * @return array
     */
    public function getValidIPV4s()
    {
        return array(
            array('93.184.220.20'),     // 中华人民共和国
            array('161.148.172.130'),   // www.brazil.gov.br
            array('161.148.172.130'),   // www.brazil.gov.br
            array('73.194.66.94'),      // google.co.uk
            array('60.92.167.193'),     // france.fr
            array('92.168.1.1'),        // LAN
            array('0.0.0.0'),
            array('55.255.255.255')
        );
    }

    /**
     * getValidIPV4s: data Provider
     *
     * @return array
     */
    public function getInvalidIPV4s()
    {
        return array(
            array('000.000.000.000'),
            array('256.255.255.255'),
            array('2001:0db8:0000:85a3:0000:0000:ac1f:8001'),
            array('2001:db8:0:85a3:0:0:ac1f:8001'),
            array(''),
            array(' '),
            array(null)
        );
    }

    /**
     * getValidIPV6s: data Provider
     *
     * @return array
     */
    public function getValidIPV6s()
    {
        return array(
            array('2001:0db8:0000:85a3:0000:0000:ac1f:8001'),
            array('2001:db8:0:85a3:0:0:ac1f:8001') // equivalent
        );
    }

    /**
     * getInvalidIPV6s: data Provider
     *
     * @return array
     */
    public function getInvalidIPV6s()
    {
        return array(
            array('0db8:0000:85a3:0000:0000:ac1f:8001'),
            array('2001:0db8:0000:85a3:0000:0000:ac1f'),
            array('93.184.220.20'),
            array(''),
            array(' '),
            array(null)
        );
    }

    /**
     * testValidIPV4s
     *
     * @param mixed $ip
     *
     * @dataProvider getValidIPV4s
     *
     * @return void
     */
    public function testValidIPV4s($ip)
    {
        $this->assertTrue(IP::validate($ip));
    }

    /**
     * testInvalidIPV6s
     *
     * @param mixed $ip
     *
     * @dataProvider getInvalidIPV4s
     *
     * @return void
     */
    public function testInvalidIPV4s($ip)
    {
        $this->assertFalse(IP::validate($ip));
    }

    /**
     * testValidIPV6s
     *
     * @param mixed $ip
     *
     * @dataProvider getValidIPV6s
     *
     * @return void
     */
    public function testValidIPV6s($ip)
    {
        $this->assertTrue(IP::validateIPV6($ip));
    }

    /**
     * testInvalidIPV6s
     *
     * @param mixed $ip
     *
     * @dataProvider getInvalidIPV6s
     *
     * @return void
     */
    public function testInvalidIPV6s($ip)
    {
        $this->assertFalse(IP::validateIPV6($ip));
    }

    protected function setUp()
    {
        parent::setUp();
    }
}
