<?php

namespace IsoCodes\Tests;

use IsoCodes\Isbn;

/**
 * Class IsbnTest
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class IsbnTest extends \PHPUnit_Framework_TestCase
{
    /**
     * getValidIsbn: data provider
     *
     * @return array
     */
    public function getValidIsbn()
    {
        return [
            ['8881837188', 10],
            ['2266111566', 10],
            ['2123456802', 10],
            ['888 18 3 7 1-88', 10],
            ['2-7605-1028-X', 10],
            ['978-88-8183-718-2', 13],
            ['978-2-266-11156-0', 13],
            ['978-2-12-345680-3', 13],
            ['978-88-8183-718-2', 13],
            ['978-2-7605-1028-9', 13],
            ['2112345678900', 13],
            // Same but with 'both' option
            ['8881837188'],
            ['2266111566'],
            ['2123456802'],
            ['888 18 3 7 1-88'],
            ['2-7605-1028-X'],
            ['978-88-8183-718-2'],
            ['978-2-266-11156-0'],
            ['978-2-12-345680-3'],
            ['978-88-8183-718-2'],
            ['978-2-7605-1028-9'],
            ['2112345678900'],
        ];
    }

    /**
     * getInvalidIsbn: data provider
     *
     * @return array
     */
    public function getInvalidIsbn()
    {
        return [
            ['8881837187'],
            ['888183718A'],
            ['stringof10'],
            [888183718],       // not a string
            [88818371880],     // not 10 chars found
            ['88818371880'],   // not 10 chars found
            ['8881837188A'],   // not numeric-only
            ['8881837189'],    // bad checksum digit
            // Valid ISBN-10 but not ISBN-13
            ['8881837188', 13],
            ['2266111566', 13],
            ['2123456802', 13],
            ['888 18 3 7 1-88', 13],
            ['2-7605-1328-X', 13],
            // Valid ISBN-13 but not ISBN-10
            ['978-88-8183-718-2', 10],
            ['978-2-266-11156-0', 10],
            ['978-2-12-345680-3', 10],
            ['978-88-8183-718-2', 10],
            ['978-2-7605-1028-9', 10],
            ['2112345678900', 10],
            [''],
            [' '],
            [null],
        ];
    }

    /**
     * testValidIsbn
     *
     * @param mixed    $isbn
     * @param int|null $type
     *
     * @dataProvider getValidIsbn
     *
     * @return void
     */
    public function testValidIsbn($isbn, $type = null)
    {
        $this->assertTrue(Isbn::validate($isbn, $type));
    }

    /**
     * testInvalidIsbn
     *
     * @param mixed    $isbn
     * @param int|null $type
     *
     * @dataProvider getInvalidIsbn
     *
     */
    public function testInvalidIsbn($isbn, $type = null)
    {
        $this->assertFalse(Isbn::validate($isbn, $type));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage ISBN type option must be 10 or 13
     */
    public function testInvalidTypeOption()
    {
        Isbn::validate('', 0);
    }
}
