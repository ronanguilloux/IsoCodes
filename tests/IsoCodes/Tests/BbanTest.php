<?php

namespace IsoCodes\Tests;

/**
 * Class BbanTest.
 *
 * @covers \IsoCodes\Bban
 */
class BbanTest extends AbstractIsoCodeInterfaceTest
{
    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
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
        return [
            ['15459450000411700920U62'],
            ['10207000260402601177083'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            [10207000260402601177083],
            ['15459 45000 0411700920U 62'],
            ['10207000260402601177084'],
            [10207000260402601177084],
        ];
    }
}
