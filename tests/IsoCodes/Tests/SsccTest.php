<?php

namespace IsoCodes\Tests;

/**
 * SsccTest
 *
 * @covers Isocodes\Sscc
 */
class SsccTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['806141411234567896'],  // http://www.gs1.org/docs/barcodes/RFID_Barcode_Interoperability_Guidelines.pdf, p.11
            ['007189085627231896'],  // http://www.morovia.com/kb/Serial-Shipping-Container-Code-SSCC18-10601.html
            ['054100001234567897'],  // https://www.barcoderobot.com/sscc.html
            ['340123450000000000'],  // http://www.activebarcode.com/codes/ean18_nve_sscc18.html
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            [000000000000000000],       // zeros only
            ['000000000000000000'],     // string containing all zeros
            [806141411234567897],       // bad checksum digit
            [8061414112345678961],      // not 13 chars found
            ['8061414112345678961'],    // not 13 chars found
            ['A06141411234567896'],     // not numeric-only
            ['806141411.2345678961'],   // dot hyphens are not OK.
        ];
    }
}
