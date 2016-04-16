<?php

namespace IsoCodes\Tests;

use IsoCodes\PhoneNumber;

/**
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class PhoneNumberTest extends AbstractIsoCodeTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['0123456789',         'FR'],

            ['+1-650-798-2800',    'US'],
            ['1-650-798-2800',     'US'],
            ['+1 650-798-2800',    'US'],
            ['1 650-798-2800',     'US'],
            ['650-798-2800',       'US'],
            ['(650)798-2800',      'US'],
            ['(650) 798-2800',     'US'],
            ['16507982800',        'US'],
            ['+1 650 798 2800',    'US'],
            ['1 650 798 2800',     'US'],
            ['650 798 2800',       'US'],
            ['+1.650.798.2800',    'US'],
            ['1.650.798.2800',     'US'],
            ['650.798.2800',       'US'],
            ['+16507982800',       'US'],
            ['16507982800',        'us'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['01234567',            'FR'],
            // Country code have to be given
            ['0123456789', null],
            // Too long phone number (catch exception)
            [implode('', range(0, 200)), null],
        ];
    }

    /**
     * @param mixed  $value
     * @param string $country
     *
     * @dataProvider getValidValues
     */
    public function testValidValues($value, $country)
    {
        $this->assertTrue(PhoneNumber::validate($value, $country));
    }

    /**
     * @param mixed  $value
     * @param string $country
     *
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value, $country)
    {
        $this->assertFalse(PhoneNumber::validate($value, $country));
    }
}
