<?php

namespace IsoCodes\Tests;

use IsoCodes\Iban;

/**
 * @covers Isocodes\Iban
 */
class IbanTest extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        parent::__construct();
        $this->setName( "IBAN unit test case" );
    }

    protected function setUp()
    {
        parent::setUp();
    }


    public function testValidIban()
    {
        $this->assertEquals( Iban::validate('CH10002300A1023502601'), true );
        $this->assertEquals( Iban::validate('DE60700517550000007229'), true );

        // valid IBANs from standard-documents found at www.ecbs.org (all OK)
        $this->assertEquals( Iban::validate('AD1200012030200359100100'), true );
        $this->assertEquals( Iban::validate('AT611904300234573201'), true );
        $this->assertEquals( Iban::validate('BA391290079401028494'), true );
//        $this->assertEquals( Iban::validate('BE68539007547034'), true );        => Invalid for chevalroux's algo. To be fixed.
//        $this->assertEquals( Iban::validate('BE43068999999501'), true );
        $this->assertEquals( Iban::validate('BG80BNBG96611020345678'), true );
        $this->assertEquals( Iban::validate('CH9300762011623852957'), true );
        $this->assertEquals( Iban::validate('CY17002001280000001200527600'), true );
        $this->assertEquals( Iban::validate('CZ6508000000192000145399'), true );
        $this->assertEquals( Iban::validate('DE89370400440532013000'), true );
        $this->assertEquals( Iban::validate('DK5000400440116243'), true );
        $this->assertEquals( Iban::validate('EE382200221020145685'), true );
        $this->assertEquals( Iban::validate('ES9121000418450200051332'), true );
        $this->assertEquals( Iban::validate('FR1420041010050500013M02606'), true );
        $this->assertEquals( Iban::validate('FI2112345600000785'), true );
        $this->assertEquals( Iban::validate('GB29NWBK60161331926819'), true );
        $this->assertEquals( Iban::validate('GI75NWBK000000007099453'), true );
        $this->assertEquals( Iban::validate('GR1601101250000000012300695'), true );
        $this->assertEquals( Iban::validate('HR1210010051863000160'), true );
        $this->assertEquals( Iban::validate('HU42117730161111101800000000'), true );
        $this->assertEquals( Iban::validate('IE29AIBK93115212345678'), true );
        $this->assertEquals( Iban::validate('IL620108000000099999999'), true );
        $this->assertEquals( Iban::validate('IS140159260076545510730339'), true );
        $this->assertEquals( Iban::validate('IT60X0542811101000000123456'), true );
        $this->assertEquals( Iban::validate('LI21088100002324013AA'), true );
        $this->assertEquals( Iban::validate('LT121000011101001000'), true );
        $this->assertEquals( Iban::validate('LU280019400644750000'), true );
        $this->assertEquals( Iban::validate('LV80BANK0000435195001'), true );
//        $this->assertEquals( Iban::validate('MC1112739000700011111000h79'), true );  => Invalid for chevalroux's algo. To be fixed.
        $this->assertEquals( Iban::validate('ME25505000012345678951'), true );
        $this->assertEquals( Iban::validate('MK07250120000058984'), true );
        $this->assertEquals( Iban::validate('MT84MALT011000012345MTLCAST001S'), true );
        $this->assertEquals( Iban::validate('MU17BOMM0101101030300200000MUR'), true );
        $this->assertEquals( Iban::validate('NL91ABNA0417164300'), true );
//        $this->assertEquals( Iban::validate('NO9386011117947'), true );               => Invalid for chevalroux's algo. To be fixed
        $this->assertEquals( Iban::validate('PL61109010140000071219812874'), true );
        $this->assertEquals( Iban::validate('PT50000201231234567890154'), true );
        $this->assertEquals( Iban::validate('RO49AAAA1B31007593840000'), true );
        $this->assertEquals( Iban::validate('RS35260005601001611379'), true );

        // SE1212312345678901234561
        // mentioned in the documents from www.ecbs.org
        // but does not validate correctly (checksum)
        // needs to be:
        $this->assertEquals( Iban::validate('SE9412312345678901234561'), true );
        $this->assertEquals( Iban::validate('SI56191000000123438'), true );
        $this->assertEquals( Iban::validate('SK3112000000198742637541'), true );
        $this->assertEquals( Iban::validate('SM86U0322509800000000270100'), true );
        $this->assertEquals( Iban::validate('TN5914207207100707129648'), true );
        $this->assertEquals( Iban::validate('TR330006100519786457841326'), true );
    }

    public function testInvalidIban()
    {
        //self::markTestIncomplete( "Not implemented" );
        $this->assertEquals( Iban::validate( '15459 45000 0411700920U 62' ), false );
        $this->assertEquals( Iban::validate( '10207000260402601177084' ), false );
        $this->assertEquals( Iban::validate( 'DE6070051755000000722' ), false );
        $this->assertEquals( Iban::validate( 'DE10002300A1023502601' ), false );
        $this->assertEquals( Iban::validate( 'PL12100500000123456789' ), false );
    }

    public function testEmptyIbanAsInvalid()
    {
        //self::markTestIncomplete( "Not implemented" );
        $this->assertEquals( Iban::validate( '' ), false );
        $this->assertEquals( Iban::validate( ' ' ), false );
    }
}
