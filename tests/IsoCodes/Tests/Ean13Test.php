<?php

namespace IsoCodes\Tests;

/**
 * Ean13Test
 *
 * @covers Isocodes\Ean13
 */
class Ean13Test extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return array(
            array('4719512002889'),     // Source: Wikipedia
            array('9782868890061'),     // Source: Wikipedia
            array('4006381333931'),     // Stabilo Point 88 Art. No. 88/57
            array('978-2-1234-5680-3'), // hyphens are OK (dash)
            array('4719-5120-0288-9'),  // hyphens are OK (dash)
            array('978 2 1234 5680 3'), // hyphens are OK (space
        );
    }

    /**
     * getInvalidEan13: data provider
     *
     * @return array
     */
    public function getInvalidValues()
    {
        return array(
            array(2266111566),          // not 13 chars found
            array('2266111566'),        // not 13 chars found
            array('A782868890061'),     // not numeric-only
            array('4006381333932'),     // bad checksum digit
            array('4719.5120.0288.9'),  // dot hyphens are not OK.
        );
    }
}
