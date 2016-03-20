<?php

namespace IsoCodes\Tests;

use IsoCodes\Gtin8;

/**
 * Gtin8Test
 *
 * @covers Isocodes\Gtin8
 */
class Gtin8Test extends \PHPUnit_Framework_TestCase
{
    /**
     * getValidGtin8: data provider
     *
     * @return array
     */
    public function getValidGtin8()
    {
        return [
            ['42345671'],  // vi.Wikipedia
            ['4719-5127'], // fr.Wikipedia
            ['9638-5074'], // en.Wikipedia
        ];
    }

    /**
     * getInvalidGtin8: data provider
     *
     * @return array
     */
    public function getInvalidGtin8()
    {
        return [
            [42345670],       // bad checksum digit
            [423456712],        // not 13 chars found
            ['423456712'],      // not 13 chars found
            ['12345671'],     // not numeric-only
            ['4234.5671'],   // dot hyphens are not OK.
            [''],
            [' ']
        ];
    }

    /**
     * testValidGtin8
     *
     * @param mixed $gtin8
     *
     * @dataProvider getValidGtin8
     *
     * @return void
     */
    public function testValidGtin8($gtin8)
    {
        $this->assertTrue(Gtin8::validate($gtin8));
    }

    /**
     * testInvalidGtin8
     *
     * @param mixed $gtin8
     *
     * @dataProvider getInvalidGtin8
     *
     * @return void
     */
    public function testInvalidGtin8($gtin8)
    {
        $this->assertFalse(Gtin8::validate($gtin8));
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
