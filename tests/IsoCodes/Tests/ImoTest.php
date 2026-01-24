<?php

namespace IsoCodes\Tests;

use IsoCodes\Imo;

class ImoTest extends AbstractIsoCodeTest
{
    public static function getValidValues()
    {
        return [
            ['9074729'], // Valid IMO
            ['IMO 9074729'], // With prefix
            ['imo 9074729'], // Lowercase prefix
            ['9176187'],
            ['9811000'], // Ever Given: The container ship that blocked the Suez Canal for six days in 2021.
            ['9241061'], // Queen Mary 2: The last remaining major ocean liner in service, operated by Cunard.
            ['9838345'], // Wonder of the Seas: One of the world's largest cruise ships, featuring 18 decks and 2,800+ staterooms.
            ['9575383'], // Rainbow Warrior: The third iteration of Greenpeace's iconic campaigning sailing vessel.
            ['7338561'], // Titanic (MY): Not the 1912 liner (which predates IMO), but a fishing support vessel named in its honor.
            ['9321483'], // Emma Maersk: Once the world's largest container ship and a pioneer of the "E-Class" giants.
        ];
    }

    public static function getInvalidValues()
    {
        return [
            ['9074728'], // Bad checksum
            ['1234568'], // Bad number (checksum 7 vs 8)
            ['123'],     // Too short
            ['12345678'], // Too long
            ['ABC'],     // Garbage
            [''],        // Empty
        ];
    }

    /**
     * @dataProvider getValidValues
     */
    public function testValidValues($imo)
    {
        $this->assertTrue(Imo::validate($imo));
    }

    /**
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($imo)
    {
        $this->assertFalse(Imo::validate($imo));
    }
}
