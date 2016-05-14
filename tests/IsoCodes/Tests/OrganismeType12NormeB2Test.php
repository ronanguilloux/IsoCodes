<?php

namespace IsoCodes\Tests;

use IsoCodes\OrganismeType12NormeB2;

/**
 * OrganismeType12NormeB2Test
 *
 * @covers IsoCodes\OrganismeType12NormeB2
 */
class OrganismeType12NormeB2Test extends AbstractIsoCodeTest
{
    /**
     * {@inheritdoc}
     */
    public function getValidValues()
    {
        return array(
            array("76031208", 2),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getInvalidValues()
    {
        return array(
            array("76031208", "2"),
            array("76031208", 0),
            array("76031208", null),
            array(1, 1),
            array("", "2"),
            array(null, 2),
            array(null, 0),
            array(null, null),
        );
    }

    /**
     * testValidOrganismeType1_2NormeB2
     *
     * @param string $code
     * @param int    $clef
     *
     * @dataProvider getValidValues
     *
     * @return void
     */
    public function testValidValues($code = "", $clef = 0)
    {
        $this->assertTrue(OrganismeType12NormeB2::validate($code, $clef));
    }

    /**
     * testInvalidOrganismeType1_2NormeB2
     *
     * @param string $code
     * @param int    $clef
     *
     * @dataProvider getInvalidValues
     *
     * @return void
     */
    public function testInvalidValues($code = "", $clef = 0)
    {
        $this->assertFalse(OrganismeType12NormeB2::validate($code, $clef));
    }
}
