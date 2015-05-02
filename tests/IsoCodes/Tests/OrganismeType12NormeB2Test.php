<?php

namespace IsoCodes\Tests;

use IsoCodes\OrganismeType12NormeB2;

/**
 * OrganismeType12NormeB2Test
 *
 * @covers IsoCodes\OrganismeType12NormeB2
 */
class OrganismeType12NormeB2Test extends \PHPUnit_Framework_TestCase
{

    /**
     * getValidClefs dataProvider
     *
     * @return array
     */
    public function getValidClefs()
    {
        return [
            ["76031208", 2],
        ];
    }

    /**
     * getInvalidClefs dataProvider
     *
     * @return array
     */
    public function getInvalidClefs()
    {
        return [
            ["76031208", "2"],
            ["76031208", 0],
            ["76031208", null],
            [1, 1],
            ["", "2"],
            [null, 2],
            [null, 0],
            [null, null],
        ];
    }

    /**
     * testValidOrganismeType1_2NormeB2
     *
     * @param string $code
     * @param int    $clef
     *
     * @dataProvider getValidClefs
     *
     * @return void
     */
    public function testValidOrganismeType12NormeB2($code = "", $clef = 0)
    {
        $this->assertTrue(OrganismeType12NormeB2::validate($code, $clef));
    }

    /**
     * testInvalidOrganismeType1_2NormeB2
     *
     * @param string $code
     * @param int    $clef
     *
     * @dataProvider getInvalidClefs
     *
     * @return void
     */
    public function testInvalidOrganismeType12NormeB2($code = "", $clef = 0)
    {
        $this->assertFalse(OrganismeType12NormeB2::validate($code, $clef));
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
    }
}
