<?php

namespace IsoCodes\Tests;

use IsoCodes\OrganismeType12NormeB2;

/**
 * Class OrganismeType12NormeB2Test.
 *
 * @covers \IsoCodes\OrganismeType12NormeB2
 */
class OrganismeType12NormeB2Test extends AbstractIsoCodeTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return [
            ['76031208', 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return [
            ['76031208', '2'],
            ['76031208', 0],
            ['76031208', null],
            [1, 1],
            ['', '2'],
            [null, 2],
            [null, 0],
            [null, null],
        ];
    }

    /**
     * testValidOrganismeType1_2NormeB2.
     *
     * @param string $code
     * @param int    $clef
     *
     * @dataProvider getValidValues
     *
     * @return void
     */
    public function testValidValues($code = '', $clef = 0)
    {
        $this->assertTrue(OrganismeType12NormeB2::validate($code, $clef));
    }

    /**
     * testInvalidOrganismeType1_2NormeB2.
     *
     * @param string $code
     * @param int    $clef
     *
     * @dataProvider getInvalidValues
     *
     * @return void
     */
    public function testInvalidValues($code = '', $clef = 0)
    {
        $this->assertFalse(OrganismeType12NormeB2::validate($code, $clef));
    }
}
