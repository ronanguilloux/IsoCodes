<?php

namespace IsoCodes\Tests;

/**
 * Class ImeiTest.
 *
 * @covers \IsoCodes\Imei
 */
class ImeiTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['35-209900-176148-1'],     // https://www.getnewidentity.com/validate-imei.php
            ['3568680000414120'],       // same
            ['35-209900-176148-23'],    // same, IMEISV, last 2 digit are a software version, not a checksum
            ['3520990017614823'],       // same
            ['490154203237518'],        // https://en.wikipedia.org/wiki/International_Mobile_Equipment_Identity
            ['352066060926230'],        // iPhone6 https://www.imei-index.com/iphone-6-imei-checker-352066060926230-canada/
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['35.209900.176148.1'],     // dot hyphens are not OK
            ['490154203237517'],        // bad checksum digit
            ['12345678901234'],         // only 14 chars found
            ['35-209900-176148-2B'],    // IMEISV but containing letters
        ];
    }
}
