<?php

namespace IsoCodes\Tests;

use IsoCodes\Isan;

/**
 * Class IsanTest.
 *
 * @covers \IsoCodes\Isan
 */
class IsanTest extends AbstractIsoCodeTest
{
    public static function getValidValues()
    {
        return [
            // Titanic (1997)
            ['ISAN 0000-0000-3EB5-0000-Q-0000-0000-X'],

            // The Godfather (1972)
            ['ISAN 0000-0001-4669-0000-Z-0000-0000-6'],

            // Sirens (1993)
            ['ISAN 0000-0000-27E7-0000-7-0000-0000-G'],

            // La camarera del Titanic (1997)
            ['ISAN 0000-0000-5947-0000-P-0000-0000-0'],

            // Titanic: The Animated Movie (2001)
            ['ISAN 0000-0001-0A93-0000-O-0000-0000-2'],

            // Another valid one from docs
            ['ISAN 0000-0000-D07A-0090-Q-0000-0000-X'],

            // Example from User (Check1 reference)
            ['B159-D8FA-0124-0000-K'],
        ];
    }

    public static function getInvalidValues()
    {
        return [
            ['ISAN 0000-0000-3EB5-0000-Q-0000-0000-0'], // Bad Check2 (Titanic X -> 0)
            ['ISAN 0000-0000-3EB5-0000-A-0000-0000-X'], // Bad Check1 (Titanic Q -> A)
            ['ISAN 0000-0000-3EB5-0000-Q-0000-0000'],   // Missing Check2 part
            ['123456'],                                 // Too short
            ['B159-D8FA-0124-0000-J'],                  // Bad Check1 (K -> J)
        ];
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($isan)
    {
        $this->assertTrue(Isan::validate($isan));
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($isan)
    {
        $this->assertFalse(Isan::validate($isan));
    }
}
