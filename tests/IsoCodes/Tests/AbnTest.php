<?php

namespace IsoCodes\Tests;

/**
 * Class AbnTest.
 *
 * @covers \IsoCodes\Abn
 */
class AbnTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['51 824 753 556'], // From https://abr.business.gov.au/Help/AbnFormat
            ['63 384 330 717'], // AFSA's ABN from https://www.ppsr.gov.au/abn-australian-business-number
            ['70 107 422 631'], // BigCommerce, NSW
            ['85 153 233 053'], // BagPiper Company, VIC
            ['60 103 455 643'],  // Crozier Bagpipes
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['51 824 753 557'],
        ];
    }
}
