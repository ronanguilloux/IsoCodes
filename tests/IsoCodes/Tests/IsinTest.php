<?php

namespace IsoCodes\Tests;

/**
 * IsinTest.
 *
 * @covers Isocodes\Isin
 */
class IsinTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return array(
            array('US0378331005'), // Apple Inc.
            array('AT0000805668'), // DWS (Austria) Abfertigung II Fonds
            array('de0008474008'), // DWS INVESTA Fonds Kurs
            array('LU0056994014'), // ABN AMRO CHINA EQUITY Fonds
            array('AU0000XVGZA3'), // Treasury Corporation of Victoria
            array('AU0000VXGZA3'), // same, mis-typed, still OK even though two letters have been transposed
            array('GB0002634946'), // BAE Systems plc
            array('GB0004005475'), // HSBC HOLDINGS PLC
            array('FR0004038099'), // GFI Informatique
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return array(
            array('LU0056994010'),
            array('XX0056994010'),
            array('US0378331004'),
            array('AA0000XVGZA3'),
        );
    }
}
