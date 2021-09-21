<?php

namespace IsoCodes\Tests;

/**
 * Class IPv6Test.
 *
 * @covers \IsoCodes\IPv6
 */
class IPv6Test extends AbstractIsoCodeTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['2001:0db8:0000:85a3:0000:0000:ac1f:8001'],
            ['2001:db8:0:85a3:0:0:ac1f:8001'], // equivalent
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
