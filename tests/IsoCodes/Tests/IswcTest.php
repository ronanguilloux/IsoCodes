<?php

namespace IsoCodes\Tests;

use IsoCodes\Iswc;

/**
 * IswcTest.
 *
 * @covers IsoCodes\Iswc
 */
class IswcTest extends \PHPUnit_Framework_TestCase
{
    /**
     * getValidSSN: data Provider.
     *
     * @return array
     */
    public function getValidIswc()
    {
        return [
            ['T-000.000.001-0'],    // The first ISWC was assigned in 1995, for the song "Dancing Queen" by ABBA.
            ['T-071070336-8'],      // "Sleigh Ride (Instrumental)" (Anderson)
            ['T-916371897-6'],      // "Sleigh Ride (Vocal Version)" (Anderson/Parish)
            ['T-345.246.800-3'],    // http://www.iswc.org/fr/faq.html (fixed!)
            ['T-802.987.480-5'],    // http://iswcnet.cisac.org/MWI/result/list.do?localEngineCode=999&pageNumber=12
        ];
    }

    /**
     * getInvalidIswc: data Provider.
     *
     * @return array
     */
    public function getInvalidIswc()
    {
        return [

            ['-000.000.001-0'],     // Missing mandatory 'T'
            ['T-802.987.480-4'],    // Bad check digit
            ['T-802.987.480'],      // Missing digit
            ['T-345346800_1'],      // bad underscore hyphen
            [' '],
            [''],
            [null],
        ];
    }

    /**
     * testValidIswc.
     *
     * @param mixed $iswc
     *
     * @dataProvider getValidIswc
     *
     * return void
     */
    public function testValidIswc($iswc)
    {
        $this->assertTrue(Iswc::validate($iswc));
    }

    /**
     * testInvalidIswc.
     *
     * @param mixed $iswc
     *
     * @dataProvider getInvalidIswc
     *
     * return void
     */
    public function testInvalidIswc($iswc)
    {
        $this->assertFalse(Iswc::validate($iswc));
    }
}
