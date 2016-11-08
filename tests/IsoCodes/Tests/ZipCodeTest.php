<?php

namespace IsoCodes\Tests;

use IsoCodes\ZipCode;

/**
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
            array('A0A 1A0',    'CA'), // Aquaforte, Avalon Peninsula, Newfoundland and Labrador
            array('A0A1A0',     'CA'), // Some Canadian people put a space in the middle, some don't
            array('H0H 0H0',    'CA'), // North Pole (for Santa Claus only)
            array('A0A 1A0',    'CA'),
            array('A0A1A0',     'CA'),
            array('A0A 1A0',    'CA'),

            array('06000',      'FR'),
            array('56000',      'FR'),
            array('56420',      'FR'),
            array('20000',      'FR'), // Ajaccio: ZIP code (20000,20090) is not an INSEE code
            array('97114',      'FR'), // 971 - 14, Trois-Rivières, Guadeloupe
            array('99999',      'FR'), // Service consommateurs
            array('99123',      'FR'), // Paris - Concours
            array('98000',      'FR'), // Monaco
            array('00100',      'FR'), // Armée
            array('01000',      'FR'),
            array('01000',      'FR'),
            array('01000',      'FR'),

            array('1234AA',     'NL'),
            array('1234 AA',    'NL'), // Some people add a space
            array('1023 AA',    'NL'),

            array('1000-001',   'PT'),
            array('1900-078',   'PT'),
            array('1250-789',   'PT'),

            array('03099',      'ES'),
            array('03201',      'ES'),
            array('29640',      'ES'),

            array('99801',      'US'), // Juneau, Alaska
            array('02115',      'US'), // Boston
            array('10001',      'US'), // New York City
            array('20008',      'US'), // Washington, D.C.
            array('99950',      'US'), // Ketchikan, Alaska (the highest ZIP code)

            array('D04 TN34',   'IE'), // Ireland, Dublin
            array('D04TN34',    'IE'), // Ireland, Dublin (without space)
            array('N91 A2Y3',   'IE'), // Ireland, Mullingar
            array('A92 VWK5',   'IE'), // Ireland, Drogheda

            array('CR0 3RL',   'GB'), // UK, Croydon
            array('BS5 7EX',   'GB'), // UK, Bristol
            array('NG4 1EP',   'GB'), // UK, Gedling
            array('W1D 1AX',   'GB'), // UK, Holborn (W1 format has extra letter in third position)
            array('WC1A 1BA',  'GB'), // UK, Holborn (WC format has extra letter in fourth position)
            array('GIR 0AA',   'GB'), // UK, Girobank/Santander (quirk)
            array('BFPO 23',   'GB'), // UK, BFPO (quirk)
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            array('560',        'CA'),
            array('5600',       'CA'),
            array('560000',     'CA'),
            array('A56000',     'CA'),
            array('A5600',      'CA'),
            array('56000A',     'CA'),
            array('A5600A',     'CA'),
            array('AAA',        'CA'),
            array('AAAA',       'CA'),
            array('AAAAA',      'CA'),
            array('A 0A1A0',    'CA'),
            array('A0 A1A0',    'CA'),
            array('A0A1 A0',    'CA'),
            array('A0A1A 0',    'CA'),
            array('A0A1a0',     'CA'),
            array('a0a1a0',     'CA'),

            array('2A004',      'FR'), // Ajaccio: INSEE code (2A004) is not a ZIP code (20000,20090)
            array('560',        'FR'),
            array('5600',       'FR'),
            array('560000',     'FR'),
            array('A56000',     'FR'),
            array('A5600',      'FR'),
            array('56000A',     'FR'),
            array('A5600A',     'FR'),
            array('AAA',        'FR'),
            array('AAAA',       'FR'),
            array('AAAAA',      'FR'),

            array('1234',       'NL'),
            array('1234A',      'NL'),
            array('AA1234',     'NL'),
            array('A1234A',     'NL'),
            array('1A2A3A',     'NL'),
            array('1234ABC',    'NL'),
            array('123AB',      'NL'),
            array('123456',     'NL'),
            array('AAAA',       'NL'),
            array('ABCD12',     'NL'),
            array('1234 ABC',   'NL'),
            array('12345A',     'NL'),
            array('1234 5A',    'NL'),
            array('0123 AA',    'NL'), // Zipcodes cannot start with 0
            array('1234aa',     'NL'),

            array('560',        'PT'),
            array('5600',       'PT'),
            array('560000',     'PT'),
            array('A56000',     'PT'),
            array('A5600',      'PT'),
            array('56000A',     'PT'),
            array('A5600A',     'PT'),
            array('AAA',        'PT'),
            array('AAAA',       'PT'),
            array('AAAAA',      'PT'),
            array('A 0A1A0',    'PT'),
            array('A0 A1A0',    'PT'),
            array('A0A1 A0',    'PT'),
            array('A0A1A 0',    'PT'),
            array('A0A1a0',     'PT'),
            array('a0a1a0',     'PT'),

            array('560',        'ES'),
            array('5600',       'ES'),
            array('560000',     'ES'),
            array('A56000',     'ES'),
            array('56000A',     'ES'),
            array('A5600A',     'ES'),
            array('AAA',        'ES'),
            array('AAAA',       'ES'),
            array('A 0A1A0',    'ES'),
            array('A0 A1A0',    'ES'),
            array('A0A1 A0',    'ES'),
            array('A0A1A 0',    'ES'),
            array('A0A1a0',     'ES'),
            array('a0a1a0',     'ES'),

            array('5600',       'US'),
            array('560000',     'US'),
            array('A56000',     'US'),
            array('A5600',      'US'),
            array('56000A',     'US'),
            array('A5600A',     'US'),
            array('AAA',        'US'),
            array('AAAA',       'US'),
            array('AAAAA',      'US'),
            array('A 0A1A0',    'US'),
            array('A0 A1A0',    'US'),
            array('A0A1 A0',    'US'),
            array('A0A1A 0',    'US'),
            array('A0A1a0',     'US'),
            array('a0a1a0',     'US'),

            array('',           'IE'),
            array('N91',        'IE'),
            array('VWK5',       'IE'),
            array('D04TN3',     'IE'),
            array('D04TN345',   'IE'),
            array('A923 VWK5',  'IE'),
            array('A92  VWK5',  'IE'),
            array('A92 VWK56',  'IE'),
            array('A923 VWK56', 'IE'),
            
            array('CR0 3RL1',     'GB'), // Extra digit at end
            array('BS5 7EX junk', 'GB'), // Ensure the regex is anchored to end (issue #108)
            array('junk BS5 7EX', 'GB'), // Ensure the regex is anchored to start (issue #108)
            array('NG4 EP1',       'GB'), // Letters and numbers transposed
            array('ZZ0 0ZZ',       'GB'), // Dummy "overseas" postcode sometimes used to skirt form validation
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
