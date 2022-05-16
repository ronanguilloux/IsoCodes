<?php

namespace IsoCodes\Tests;

/**
 * Class IPv4Test.
 *
 * @covers \IsoCodes\IPv4
 */
class IPv4Test extends AbstractIsoCodeTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['93.184.220.20'],     // 中华人民共和国
            ['161.148.172.130'],   // www.brazil.gov.br
            ['161.148.172.130'],   // www.brazil.gov.br
            ['73.194.66.94'],      // google.co.uk
            ['60.92.167.193'],     // france.fr
            ['92.168.1.1'],        // LAN
            ['0.0.0.0'],
            ['55.255.255.255'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['000.000.000.000'],
            ['256.255.255.255'],
            ['2001:0db8:0000:85a3:0000:0000:ac1f:8001'],
            ['2001:db8:0:85a3:0:0:ac1f:8001'],
        ];
    }
}
