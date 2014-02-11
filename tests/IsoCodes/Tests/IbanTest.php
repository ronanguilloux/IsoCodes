<?php

namespace IsoCodes\Tests;

use IsoCodes\Iban;

/**
 * @covers Isocodes\Iban
 */
class IbanTest extends \PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
        parent::setUp();
    }

    /**
     * testValidIban: dataprovider
     *
     * @return array
     */
    public function ibans()
    {
        return array(
            //good:
            array('CH10002300A1023502601',          true),
            array('DE60700517550000007229',         true),
            // valid IBANs from standard-documents found at www.ecbs.org (all OK)
            array('AD1200012030200359100100',       true),
            array('AT611904300234573201',           true),
            array('BA391290079401028494',           true),
            array('BE68539007547034',               true),
            array('BE43068999999501',               true),
            array('BG80BNBG96611020345678',         true),
            array('CH9300762011623852957',          true),
            array('CY17002001280000001200527600',   true),
            array('CZ6508000000192000145399',       true),
            array('DE89370400440532013000',         true),
            array('DK5000400440116243',             true),
            array('EE382200221020145685',           true),
            array('ES9121000418450200051332',       true),
            array('FR1420041010050500013M02606',    true),
            array('FI2112345600000785',             true),
            array('GB29NWBK60161331926819',         true),
            array('GI75NWBK000000007099453',        true),
            array('GR1601101250000000012300695',    true),
            array('HR1210010051863000160',          true),
            array('HU42117730161111101800000000',   true),
            array('IE29AIBK93115212345678',         true),
            array('IL620108000000099999999',        true),
            array('IS140159260076545510730339',     true),
            array('IT60X0542811101000000123456',    true),
            array('LI21088100002324013AA',          true),
            array('LT121000011101001000',           true),
            array('LU280019400644750000',           true),
            array('LV80BANK0000435195001',          true),
            array('MC1112739000700011111000H79',    true),
            array('ME25505000012345678951',         true),
            array('MK07250120000058984',            true),
            array('MT84MALT011000012345MTLCAST001S',true),
            array('MU17BOMM0101101030300200000MUR', true),
            array('NL91ABNA0417164300',             true),
            array('NO9386011117947',                true),
            array('PL61109010140000071219812874',   true),
            array('PT50000201231234567890154',      true),
            array('RO49AAAA1B31007593840000',       true),
            array('RS35260005601001611379',         true),
            // SE1212312345678901234561
            // mentioned in the documents from www.ecbs.org
            // but does not validate correctly (checksum)
            // needs to be:
            array('SE9412312345678901234561',       true),
            array('SI56191000000123438',            true),
            array('SK3112000000198742637541',       true),
            array('SM86U0322509800000000270100',    true),
            array('TN5914207207100707129648',       true),
            array('TR330006100519786457841326',     true),
            //bad:
            array('15459 45000 0411700920U 62',     false),
            array('10207000260402601177084',        false),
            array('DE6070051755000000722',          false),
            array('DE10002300A1023502601',          false),
            array('PL12100500000123456789',         false),
            array('',                               false),
            array(' ',                              false)
        );
    }

    /**
     * testIban
     *
     * @dataProvider ibans
     *
     * @param string iban
     * @param bool $result
     * @return void
     */
    public function testIban($iban, $result)
    {
        $this->assertEquals( Iban::validate($iban), $result );
    }
}
