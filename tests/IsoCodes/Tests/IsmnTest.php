<?php

namespace IsoCodes\Tests;

use IsoCodes\Ismn;

/**
 * IsmnTest
 *
 * @covers IsoCodes\Ismn
 */
class IsmnTest extends \PHPUnit_Framework_TestCase
{

    /**
     * getValidSSN: data Provider
     *
     * @return array
     */
    public function getValidIsmn()
    {
        return [
            ['979-0-2600-0043-8'],  // Wikipedia
            ['979-0-060-11561-5'],  // Wikipedia
            ['979-0-9016791-7-7'],  // Wikipedia
            ['9 790230 671187'],    // http://www.ismn-international.org/whatis.html
        ];
    }

    /**
     * getInvalidIsmn: data Provider
     *
     * @return array
     */
    public function getInvalidIsmn()
    {
        return [

            ['979-0-060-11561-4'],  // bad check digit
            ['979-0-9016791-5'],    // missing digit
            ['979.0.9016791.7.7'],  // bad dot hyphen
            [' '],
            [''],
            [null]
        ];
    }

    /**
     * testValidIsmn
     *
     * @param mixed $ssn
     *
     * @dataProvider getValidIsmn
     *
     * return void
     */
    public function testValidIsmn($ssn)
    {
        $this->assertTrue(Ismn::validate($ssn));
    }

    /**
     * testInvalidIsmn
     *
     * @param mixed $ssn
     *
     * @dataProvider getInvalidIsmn
     *
     * return void
     */
    public function testInvalidIsmn($ssn)
    {
        $this->assertFalse(Ismn::validate($ssn));
    }
}
