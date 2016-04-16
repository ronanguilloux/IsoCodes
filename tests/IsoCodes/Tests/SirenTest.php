<?php

namespace IsoCodes\Tests;

/**
 * SirenTest
 *
 * @covers IsoCodes\Siren
 */
class SirenTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return array(
            array('432167567'),
            array(432167567),
            array('417625639'),
            array('334932720'),
            array('440288371'),
            array('517439543')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return array(
            array('44079707'),
            array(44079707),
            array('4407970745'),
            array('440797075'),
            array('488537813'),
            array('432167568'),
            array('417625630'),
            array('334932721'),
            array('440288372'),
            array('517439544'),
            array('azertyuio'),
        );
    }
}
