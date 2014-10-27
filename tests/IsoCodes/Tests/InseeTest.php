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
        return array(
            array('177022A00100229'),   // Corse: 2A
            array('253012B073004'),     // Corse: 2B, clef optionnelle omise
            array('177025626004544'),
            array('253077507300483'),
            array('188057208107893')
        );
    }

    /**
     * getInsees: data Provider
     *
     * @return array
     */
    public function getInvalidInsees()
    {
        return array(
            array('353072B07300483'),
            array('253072C07300483'),
            array(''),
            array(' '),
            array(null),
        );
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
