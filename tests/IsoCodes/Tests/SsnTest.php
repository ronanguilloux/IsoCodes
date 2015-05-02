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
        return [
            ['423-05-9675'],
            ['432-01-5257'],
            ['600-01-4950'],
            ['619-01-7173'],
            ['651-01-3431']
        ];
    }

    /**
     * getInvalidSsn: data Provider
     *
     * @return array
     */
    public function getInvalidSsn()
    {
        return [
            ['574-09-0776'],
            ['123-45-6789'],
            ['1234-567-89'],
            ['123456789'],
            ['773-45-6789'],
            [''],
            [' '],
            [null]
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
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
        $this->ssn = new Ssn();
    }
}
