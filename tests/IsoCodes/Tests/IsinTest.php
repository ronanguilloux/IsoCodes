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
        return [
            ['US0378331005'], // Apple Inc.
            ['AT0000805668'], // DWS (Austria) Abfertigung II Fonds
            ['de0008474008'], // DWS INVESTA Fonds Kurs
            ['LU0056994014'], // ABN AMRO CHINA EQUITY Fonds
            ['AU0000XVGZA3'], // Treasury Corporation of Victoria
            ['AU0000VXGZA3'], // same, mis-typed, still OK even though two letters have been transposed
            ['GB0002634946'], // BAE Systems plc
            ['GB0004005475'], // HSBC HOLDINGS PLC
            ['FR0004038099'], // GFI Informatique
            ['US5949181045'], // Microsoft
            ['FR0003500008'], // CAC40
            ['FR0000133308']  // France Telecom
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['LU0056994010'],
            ['XX0056994010'],
            ['US0378331004'],
            ['AA0000XVGZA3']
        ];
    }
}
