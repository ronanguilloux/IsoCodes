<?php

namespace IsoCodes\Tests;

/**
 * GsrnTest
 *
 * @covers Isocodes\Gsrn
 */
class GsrnTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['735005385000000011'],
            ['735005385 00000001 1'],
            ['735005385-00000001-1']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return array(
            array('73500538500000001'),     // not 18 chars found
            array(73500538500000001),       // same, but integer
            array('735005385-000000001-1'), // too long
            array('735005385-A0000001-1'),  // not numeric-only
            array('735005385-00000001-2'),  // bad checksum digit
            array('735005385-00000001.1'),  // dot hyphens are not OK.
        );
    }
}
