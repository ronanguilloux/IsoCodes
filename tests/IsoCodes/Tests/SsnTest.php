<?php

namespace IsoCodes\Tests;

use IsoCodes\Ssn;

/**
 * SsnTest
 *
 * @covers IsoCodes\Ssn
 */
class SsnTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Ssn
     */
    protected $ssn;

    /**
     * getValidSSN: data Provider
     *
     * @return array
     */
    public function getValidSsn()
    {
        // generated here : http://fr.fakenamegenerator.com/social-security-number.php
        return array(
            array('423-05-9675'),
            array('432-01-5257'),
            array('600-01-4950'),
            array('619-01-7173'),
            array('651-01-3431')
        );
    }

    /**
     * getInvalidSsn: data Provider
     *
     * @return array
     */
    public function getInvalidSsn()
    {
        return array(
            array('574-09-0776'),
            array('123-45-6789'),
            array('1234-567-89'),
            array('123456789'),
            array('773-45-6789'),
            array(''),
            array(' '),
            array(null)
        );
    }

    public function getStatesToGenerate()
    {
        return [
            [false],
            ['AK'],
            ['AL'],
            ['AR'],
            ['AZ'],
            ['CA'],
            ['CO'],
            ['CT'],
            ['DC'],
            ['DE'],
            ['FL'],
            ['GA'],
            ['HI'],
            ['IA'],
            ['ID'],
            ['IL'],
            ['IN'],
            ['KS'],
            ['KY'],
            ['LA'],
            ['MA'],
            ['MD'],
            ['ME'],
            ['MI'],
            ['MN'],
            ['MO'],
            ['MS'],
            ['MT'],
            ['NC'],
            ['ND'],
            ['NE'],
            ['NH'],
            ['NJ'],
            ['NM'],
            ['NV'],
            ['NY'],
            ['OH'],
            ['OK'],
            ['OR'],
            ['PA'],
            ['RI'],
            ['SC'],
            ['SD'],
            ['TN'],
            ['TX'],
            ['UT'],
            ['VA'],
            ['VT'],
            ['WA'],
            ['WI'],
            ['WV'],
            ['WY'],
        ];
    }

    /**
     * testValidSsn
     *
     * @param mixed $ssn
     *
     * @dataProvider getValidSsn
     *
     * return void
     */
    public function testValidSsn($ssn)
    {
        $this->assertTrue($this->ssn->validate($ssn));
        $this->assertTrue(Ssn::validate($ssn));
    }

    /**
     * testInvalidSsn
     *
     * @param mixed $ssn
     *
     * @dataProvider getInvalidSsn
     *
     * return void
     */
    public function testInvalidSsn($ssn)
    {
        $this->assertFalse($this->ssn->validate($ssn));
        $this->assertFalse(Ssn::validate($ssn));
    }

    /**
     * run generate function to verify it not crash
     *
     * @param $state
     *
     * @dataProvider getStatesToGenerate
     */
    public function testGenerate($state)
    {
        $this->ssn->generate($state);
    }

    /**
     * Old constructor test. To be remove on 2.0.
     */
    public function testOldConstructor()
    {
        \PHPUnit_Framework_Error_Deprecated::$enabled = false;
        $ssn = new Ssn();
        \PHPUnit_Framework_Error_Deprecated::$enabled = true;

        $this->assertInstanceOf('IsoCodes\Ssn', $ssn);
    }

    protected function setUp()
    {
        $this->ssn = Ssn::getInstance();
    }
}
