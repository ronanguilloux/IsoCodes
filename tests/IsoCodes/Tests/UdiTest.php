<?php

namespace IsoCodes\Tests;

/**
 * UdiTest
 *
 * @covers Isocodes\Udi
 */
class UdiTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['07610221010301'],  // https://accessgudid.nlm.nih.gov/devices/07610221010301
            ['10887488125541'],  // https://accessgudid.nlm.nih.gov/devices/10887488125541
            ['00868866000011'],  // https://accessgudid.nlm.nih.gov/devices/00868866000011
            ['1038178 0064596'],  // https://accessgudid.nlm.nih.gov/devices/10381780064596
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            [0000000000000],        // 13 zeros only
            ['0000000000000'],      // string containing 13 zeros
            [10381780064595],       // bad checksum digit
            [1038178006459],        // not 13 chars found
            ['0761022101030'],      // not 13 chars found (string)
            ['0761022101030A'],     // not numeric-only
            ['1038178.0064596'],    // dot hyphens are not OK.
        ];
    }
}
