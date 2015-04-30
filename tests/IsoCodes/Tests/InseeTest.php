<?php

namespace IsoCodes\Tests;

use IsoCodes\Insee;

/**
 * InseeTest
 *
 * @covers Isocodes\Insee
 */
class InseeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * getInsees: data Provider
     *
     * @return array
     */
    public function getValidInsees()
    {
        return [
            ['177022A00100229'],   // Corse: 2A
            ['253012B073004'],     // Corse: 2B, clef optionnelle omise
            ['177025626004544'],
            ['253077507300483'],
            ['188057208107893']
        ];
    }

    /**
     * getInsees: data Provider
     *
     * @return array
     */
    public function getInvalidInsees()
    {
        return [
            ['353072B07300483'],
            ['253072C07300483'],
            [''],
            [' '],
            [null],
        ];
    }

    /**
     * testValidInsee
     *
     * @param mixed $insee
     *
     * @dataProvider getValidInsees
     *
     * @return void
     */
    public function testValidInsee($insee)
    {
        $this->assertTrue(Insee::validate($insee));
    }

    /**
     * testValidInsee
     *
     * @param mixed $insee
     *
     * @dataProvider getInvalidInsees
     *
     * @return void
     */
    public function testInvalidInsee($insee)
    {
        $this->assertFalse(Insee::validate($insee));
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
