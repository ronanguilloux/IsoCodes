<?php

namespace IsoCodes\Tests;

/**
 * BbanTest
 *
 * @covers Isocodes\Bban
 */
class BbanTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        if (!extension_loaded('bcmath')) {
            $this->markTestSkipped('The bcmath extension is needed.');
        }
        parent::setUp();
    }

    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return array(
            array('15459450000411700920U62'),
            array('10207000260402601177083')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return array(
            array(10207000260402601177083),
            array('15459 45000 0411700920U 62'),
            array('10207000260402601177084'),
            array(10207000260402601177084),
        );
    }
}
