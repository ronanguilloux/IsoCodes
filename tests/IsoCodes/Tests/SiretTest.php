<?php

namespace IsoCodes\Tests;

/**
 * Class SiretTest.
 *
 * @covers \IsoCodes\Siret
 *
 * @uses   \IsoCodes\Siren
 */
class SiretTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     * Source of truth: https://data.opendatasoft.com/explore/dataset/sirene_v3%40public/.
     */
    public function getValidValues()
    {
        return [
            [44079707400026],
            ['48853781200015'],
            ['43216756700028'],
            ['41762563900030'],
            ['33493272000017'],
            ['44028837100014'],
            ['51743954300011'],
            ['35600000000048'],  // La Poste - Paris XV
            ['35600000049837'],  // La Poste - Viry Chatillon
            ['35600053914285'],  // La Poste - Rennes, SIREN '356 000 539' between '356 000 000' and '356 000 999'
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            [440797074000],
            ['440797074000278'],
            ['44079707400027'],
            ['48853781200016'],
            ['43216756700029'],
            ['41762563900031'],
            ['33493272000018'],
            ['44028837100015'],
            ['51743954300012'],
            ['35600000049838'],  // La Poste - Viry Chatillon + w/ wrong sum
            ['azertyuiopqsdf'],
        ];
    }
}
