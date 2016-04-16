<?php

namespace IsoCodes\Tests;

/**
 * UkninTest
 *
 * @covers IsoCodes\Uknin
 */
class UkninTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return array(
            array('AB123456C'),
            array('EH123456A'),
            array('HG123456B')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return array(
            array('AD123456CA'),
            array('AD12345C'),
            array('AD123456'),
            array('AF123456C'),
            array('AB123456F'),
            array('TN011258F'),
            array('azertyuiop')
        );
    }
}
