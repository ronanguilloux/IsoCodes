<?php

namespace IsoCodes\Tests;

use IsoCodes\Iban;

/**
 * IbanTest
 *
 * @covers Isocodes\Iban
 */
class IbanTest extends \PHPUnit_Framework_TestCase
{

    /**
     * getValidIbans: dataprovider
     *
     * @return array
     */
    public function getValidIbans()
    {
        return array(
            array('CH10002300A1023502601'),
            array('DE60700517550000007229'),
            // valid IBANs from standard-documents found at www.ecbs.org (all OK):
            array('AD1200012030200359100100'),
            array('AT611904300234573201'),
            array('BA391290079401028494'),
            array('BE68539007547034'),
            array('BE43068999999501'),
            array('BG80BNBG96611020345678'),
            array('CH9300762011623852957'),
            array('CY17002001280000001200527600'),
            array('CZ6508000000192000145399'),
            array('DE89370400440532013000'),
            array('DK5000400440116243'),
            array('EE382200221020145685'),
            array('ES9121000418450200051332'),
            array('FR1420041010050500013M02606'),
            array('FI2112345600000785'),
            array('GB29NWBK60161331926819'),
            array('GI75NWBK000000007099453'),
            array('GR1601101250000000012300695'),
            array('HR1210010051863000160'),
            array('HU42117730161111101800000000'),
            array('IE29AIBK93115212345678'),
            array('IL620108000000099999999'),
            array('IS140159260076545510730339'),
            array('IT60X0542811101000000123456'),
            array('LI21088100002324013AA'),
            array('LT121000011101001000'),
            array('LU280019400644750000'),
            array('LV80BANK0000435195001'),
            array('MC1112739000700011111000H79'),
            array('ME25505000012345678951'),
            array('MK07250120000058984'),
            array('MT84MALT011000012345MTLCAST001S'),
            array('MU17BOMM0101101030300200000MUR'),
            array('NL91ABNA0417164300'),
            array('NO9386011117947'),
            array('PL61109010140000071219812874'),
            array('PT50000201231234567890154'),
            array('RO49AAAA1B31007593840000'),
            array('RS35260005601001611379'),
            // SE1212312345678901234561
            // mentioned in the documents from www.ecbs.org
            // but does not validate correctly (checksum)
            // needs to be:
            array('SE9412312345678901234561'),
            array('SI56191000000123438'),
            array('SK3112000000198742637541'),
            array('SM86U0322509800000000270100'),
            array('TN5914207207100707129648'),
            array('TR330006100519786457841326'),
        );
    }

    /**
     * getInvalidIbans: dataprovider
     *
     * @return array
     */
    public function getInvalidIbans()
    {
        return array(
            array('15459 45000 0411700920U 62', false),
            array('10207000260402601177084', false),
            array('DE6070051755000000722', false),
            array('DE10002300A1023502601', false),
            array('PL12100500000123456789', false),
            array('', false),
            array(' ', false)
        );
    }

    /**
     * testValidIban
     *
     * @param string $iban
     *
     * @dataProvider getValidIbans
     *
     * @return void
     */
    public function testValidIban($iban)
    {
        $this->assertTrue(Iban::validate($iban));
    }

    /**
     * testInvalidIban
     *
     * @param string $iban
     *
     * @dataProvider getInvalidIbans
     *
     * @return void
     */
    public function testInvalidIban($iban)
    {
        $this->assertFalse(Iban::validate($iban));
    }

    protected function setUp()
    {
        parent::setUp();
    }
}
