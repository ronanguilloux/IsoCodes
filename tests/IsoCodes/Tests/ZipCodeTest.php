<?php

namespace IsoCodes\Tests;

use IsoCodes\ZipCode;

/**
 * Class ZipCodeTest.
 *
 * @covers \IsoCodes\ZipCode
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class ZipCodeTest extends AbstractIsoCodeTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['A0A 1A0',    'CA'], // Aquaforte, Avalon Peninsula, Newfoundland and Labrador
            ['A0A1A0',     'CA'], // Some Canadian people put a space in the middle, some don't
            ['H0H 0H0',    'CA'], // North Pole (for Santa Claus only)
            ['A0A 1A0',    'CA'],
            ['A0A1A0',     'CA'],
            ['A0A 1A0',    'CA'],

            ['06000',      'FR'],
            ['56000',      'FR'],
            ['56420',      'FR'],
            ['20000',      'FR'], // Ajaccio: ZIP code (20000,20090) is not an INSEE code
            ['97114',      'FR'], // 971 - 14, Trois-Rivières, Guadeloupe
            ['99999',      'FR'], // Service consommateurs
            ['99123',      'FR'], // Paris - Concours
            ['98000',      'FR'], // Monaco
            ['00100',      'FR'], // Armée
            ['01000',      'FR'],
            ['01000',      'FR'],
            ['01000',      'FR'],

            ['1234AA',     'NL'],
            ['1234 AA',    'NL'], // Some people add a space
            ['1023 AA',    'NL'],

            ['1000-001',   'PT'],
            ['1900-078',   'PT'],
            ['1250-789',   'PT'],

            ['03099',      'ES'],
            ['03201',      'ES'],
            ['29640',      'ES'],

            ['99801',      'US'], // Juneau, Alaska
            ['02115',      'US'], // Boston
            ['10001',      'US'], // New York City
            ['20008',      'US'], // Washington, D.C.
            ['99950',      'US'], // Ketchikan, Alaska (the highest ZIP code)

            ['D04 TN34',   'IE'], // Ireland, Dublin
            ['D04TN34',    'IE'], // Ireland, Dublin (without space)
            ['N91 A2Y3',   'IE'], // Ireland, Mullingar
            ['A92 VWK5',   'IE'], // Ireland, Drogheda

            ['CR0 3RL',   'GB'], // UK, Croydon
            ['BS5 7EX',   'GB'], // UK, Bristol
            ['NG4 1EP',   'GB'], // UK, Gedling
            ['W1D 1AX',   'GB'], // UK, Holborn (W1 format has extra letter in third position)
            ['WC1A 1BA',  'GB'], // UK, Holborn (WC format has extra letter in fourth position)
            ['GIR 0AA',   'GB'], // UK, Girobank/Santander (quirk)
            ['BFPO 23',   'GB'], // UK, BFPO (quirk)
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['560',        'CA'],
            ['5600',       'CA'],
            ['560000',     'CA'],
            ['A56000',     'CA'],
            ['A5600',      'CA'],
            ['56000A',     'CA'],
            ['A5600A',     'CA'],
            ['AAA',        'CA'],
            ['AAAA',       'CA'],
            ['AAAAA',      'CA'],
            ['A 0A1A0',    'CA'],
            ['A0 A1A0',    'CA'],
            ['A0A1 A0',    'CA'],
            ['A0A1A 0',    'CA'],
            ['A0A1a0',     'CA'],
            ['a0a1a0',     'CA'],

            ['2A004',      'FR'], // Ajaccio: INSEE code (2A004) is not a ZIP code (20000,20090)
            ['560',        'FR'],
            ['5600',       'FR'],
            ['560000',     'FR'],
            ['A56000',     'FR'],
            ['A5600',      'FR'],
            ['56000A',     'FR'],
            ['A5600A',     'FR'],
            ['AAA',        'FR'],
            ['AAAA',       'FR'],
            ['AAAAA',      'FR'],

            ['1234',       'NL'],
            ['1234A',      'NL'],
            ['AA1234',     'NL'],
            ['A1234A',     'NL'],
            ['1A2A3A',     'NL'],
            ['1234ABC',    'NL'],
            ['123AB',      'NL'],
            ['123456',     'NL'],
            ['AAAA',       'NL'],
            ['ABCD12',     'NL'],
            ['1234 ABC',   'NL'],
            ['12345A',     'NL'],
            ['1234 5A',    'NL'],
            ['0123 AA',    'NL'], // Zipcodes cannot start with 0
            ['1234aa',     'NL'],

            ['560',        'PT'],
            ['5600',       'PT'],
            ['560000',     'PT'],
            ['A56000',     'PT'],
            ['A5600',      'PT'],
            ['56000A',     'PT'],
            ['A5600A',     'PT'],
            ['AAA',        'PT'],
            ['AAAA',       'PT'],
            ['AAAAA',      'PT'],
            ['A 0A1A0',    'PT'],
            ['A0 A1A0',    'PT'],
            ['A0A1 A0',    'PT'],
            ['A0A1A 0',    'PT'],
            ['A0A1a0',     'PT'],
            ['a0a1a0',     'PT'],

            ['560',        'ES'],
            ['5600',       'ES'],
            ['560000',     'ES'],
            ['A56000',     'ES'],
            ['56000A',     'ES'],
            ['A5600A',     'ES'],
            ['AAA',        'ES'],
            ['AAAA',       'ES'],
            ['A 0A1A0',    'ES'],
            ['A0 A1A0',    'ES'],
            ['A0A1 A0',    'ES'],
            ['A0A1A 0',    'ES'],
            ['A0A1a0',     'ES'],
            ['a0a1a0',     'ES'],

            ['5600',       'US'],
            ['560000',     'US'],
            ['A56000',     'US'],
            ['A5600',      'US'],
            ['56000A',     'US'],
            ['A5600A',     'US'],
            ['AAA',        'US'],
            ['AAAA',       'US'],
            ['AAAAA',      'US'],
            ['A 0A1A0',    'US'],
            ['A0 A1A0',    'US'],
            ['A0A1 A0',    'US'],
            ['A0A1A 0',    'US'],
            ['A0A1a0',     'US'],
            ['a0a1a0',     'US'],

            ['',           'IE'],
            ['N91',        'IE'],
            ['VWK5',       'IE'],
            ['D04TN3',     'IE'],
            ['D04TN345',   'IE'],
            ['A923 VWK5',  'IE'],
            ['A92  VWK5',  'IE'],
            ['A92 VWK56',  'IE'],
            ['A923 VWK56', 'IE'],

            ['CR0 3RL1',     'GB'], // Extra digit at end
            ['BS5 7EX junk', 'GB'], // Ensure the regex is anchored to end (issue #108)
            ['junk BS5 7EX', 'GB'], // Ensure the regex is anchored to start (issue #108)
            ['NG4 EP1',       'GB'], // Letters and numbers transposed
            ['ZZ0 0ZZ',       'GB'], // Dummy "overseas" postcode sometimes used to skirt form validation
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
        $this->assertTrue(ZipCode::validate($value, $country));
    }

    /**
     * @param mixed  $value
     * @param string $country
     *
     * @dataProvider getInvalidValues
     */
    public function testInvalidValues($value, $country)
    {
        $this->assertFalse(ZipCode::validate($value, $country));
    }

    public function testEmptyValuesByCountry()
    {
        foreach (ZipCode::getAvailableCountries() as $country) {
            foreach ($this->getEmptyValues() as $value) {
                $this->assertFalse(ZipCode::validate($value, $country), 'Empty value should be invalid.');
            }
        }
    }
}
