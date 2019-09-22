<?php

namespace IsoCodes\Tests;

/**
 * @covers IsoCodes\Siret
 * @uses   IsoCodes\Siren
 */
class SiretTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     * Source of truth: https://data.opendatasoft.com/explore/dataset/sirene_v3%40public/
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
            array('51743954300011'),
            array('35600000000048'),  // La Poste - Paris XV
            array('35600000049837'),  // La Poste - Viry Chatillon
            array('35600053914285'),  // La Poste - Rennes, SIREN '356 000 539' between '356 000 000' and '356 000 999'
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
            array('35600000049838'),  // La Poste - Viry Chatillon + w/ wrong sum
            array('azertyuiopqsdf')
        );
    }
}
