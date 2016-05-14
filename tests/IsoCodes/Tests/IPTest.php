<?php

namespace IsoCodes\Tests;

use IsoCodes\IP;

/**
 * IPTest
 *
 * @covers IsoCodes\IP
 */
class IPTest extends AbstractIsoCodeTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['93.184.220.20', 4],     // 中华人民共和国
            ['161.148.172.130', 4],   // www.brazil.gov.br
            ['161.148.172.130', 4],   // www.brazil.gov.br
            ['73.194.66.94', 4],      // google.co.uk
            ['60.92.167.193', 4],     // france.fr
            ['92.168.1.1', 4],        // LAN
            ['0.0.0.0', 4],
            ['55.255.255.255', 4],
            ['2001:0db8:0000:85a3:0000:0000:ac1f:8001', 6],
            ['2001:db8:0:85a3:0:0:ac1f:8001', 6] // equivalent
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['000.000.000.000', 4],
            ['256.255.255.255', 4],
            ['2001:0db8:0000:85a3:0000:0000:ac1f:8001', 4],
            ['2001:db8:0:85a3:0:0:ac1f:8001', 4],
            ['0db8:0000:85a3:0000:0000:ac1f:8001', 6],
            ['2001:0db8:0000:85a3:0000:0000:ac1f', 6],
            ['93.184.220.20', 6],
        ];
    }

    /**
     * @param mixed  $value
     * @param int    $type
     *
     * @dataProvider getValidValues
     */
    public function testValidValues($value, $type)
    {
        $this->assertTrue(6 === $type ? Ip::validateIPV6($value) : Ip::validate($value));
    }

    /**
     * @param mixed  $value
     * @param int    $type
     *
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value, $type)
    {
        $this->assertFalse(6 === $type ? Ip::validateIPV6($value) : Ip::validate($value));
    }
}
