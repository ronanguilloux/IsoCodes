<?php

namespace IsoCodes\Tests;

/**
 * @covers IsoCodes\Siret
 * @uses IsoCodes\Siren
 */
class SiretTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return array(
            array(44079707400026),
            array('48853781200015'),
            array('43216756700028'),
            array('41762563900030'),
            array('33493272000017'),
            array('44028837100014'),
            array('51743954300011')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return array(
            array(440797074000),
            array('440797074000278'),
            array('44079707400027'),
            array('48853781200016'),
            array('43216756700029'),
            array('41762563900031'),
            array('33493272000018'),
            array('44028837100015'),
            array('51743954300012'),
            array('azertyuiopqsdf')
        );
    }
}
