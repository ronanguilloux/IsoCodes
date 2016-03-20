<?php

namespace IsoCodes\Tests;

use IsoCodes\Sscc;

/**
 * SsccTest
 *
 * @covers Isocodes\Sscc
 */
class SsccTest extends \PHPUnit_Framework_TestCase
{
    /**
     * getValidSscc: data provider
     *
     * @return array
     */
    public function getValidSscc()
    {
        return [
            ['806141411234567896'],  // http://www.gs1.org/docs/barcodes/RFID_Barcode_Interoperability_Guidelines.pdf, p.11
            ['007189085627231896'],  // http://www.morovia.com/kb/Serial-Shipping-Container-Code-SSCC18-10601.html
            ['054100001234567897'],  // https://www.barcoderobot.com/sscc.html
            ['340123450000000000'],  // http://www.activebarcode.com/codes/ean18_nve_sscc18.html
        ];
    }

    /**
     * getInvalidSscc: data provider
     *
     * @return array
     */
    public function getInvalidSscc()
    {
        return [
            [806141411234567897],       // bad checksum digit
            [8061414112345678961],      // not 13 chars found
            ['8061414112345678961'],    // not 13 chars found
            ['A06141411234567896'],     // not numeric-only
            ['806141411.2345678961'],   // dot hyphens are not OK.
            [''],
            [' ']
        ];
    }

    /**
     * testValidSscc
     *
     * @param mixed $sscc
     *
     * @dataProvider getValidSscc
     *
     * @return void
     */
    public function testValidSscc($sscc)
    {
        $this->assertTrue(Sscc::validate($sscc));
    }

    /**
     * testInvalidSscc
     *
     * @param mixed $sscc
     *
     * @dataProvider getInvalidSscc
     *
     * @return void
     */
    public function testInvalidSscc($sscc)
    {
        $this->assertFalse(Sscc::validate($sscc));
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
