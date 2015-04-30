<?php

namespace IsoCodes\Tests;

use IsoCodes\Ean13;

/**
 * Ean13Test
 *
 * @covers Isocodes\Ean13
 */
class Ean13Test extends \PHPUnit_Framework_TestCase
{
    /**
     * getValidEan13: data provider
     *
     * @return array
     */
    public function getValidEan13()
    {
        return [
            ['4719512002889'],     // Source: Wikipedia
            ['9782868890061'],     // Source: Wikipedia
            ['4006381333931'],     // Stabilo Point 88 Art. No. 88/57
            ['978-2-1234-5680-3'], // hyphens are OK (dash)
            ['4719-5120-0288-9'],  // hyphens are OK (dash)
            ['978 2 1234 5680 3'], // hyphens are OK (space
        ];
    }

    /**
     * getInvalidEan13: data provider
     *
     * @return array
     */
    public function getInvalidEan13()
    {
        return [
            [2266111566],          // not 13 chars found
            ['2266111566'],        // not 13 chars found
            ['A782868890061'],     // not numeric-only
            ['4006381333932'],     // bad checksum digit
            ['4719.5120.0288.9'],  // dot hyphens are not OK.
            [''],
            [' ']
        ];
    }

    /**
     * testValidEan13
     *
     * @param mixed $ean13
     *
     * @dataProvider getValidEan13
     *
     * @return void
     */
    public function testValidEan13($ean13)
    {
        $this->assertTrue(Ean13::validate($ean13));
    }

    /**
     * testInvalidEan13
     *
     * @param mixed $ean13
     *
     * @dataProvider getInvalidEan13
     *
     * @return void
     */
    public function testInvalidEan13($ean13)
    {
        $this->assertFalse(Ean13::validate($ean13));
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
