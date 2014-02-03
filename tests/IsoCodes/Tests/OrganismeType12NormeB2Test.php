<?php

namespace IsoCodes\Tests;

use IsoCodes\OrganismeType12NormeB2;

/**
 * @covers IsoCodes\OrganismeType12NormeB2
 */
class OrganismeType12NormeB2Test  extends \PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
        parent::setUp();
    }

    /**
     * getClefs dataProvider
     *
     * @return array
     */
    public function getClefs()
    {
        return array(
            //good:
            array("76031208",   2,      true),
            //bad:
            array("76031208",   "2",    false),
            array("76031208",   0,      false),
            array("76031208",   null,   false),
            array(1,            1,      false),
            array("",           "2",    false),
            array(null,         2,      false),
            array(null,         0,      false),
            array(null,         null,   false),
        );
    }

    /**
     * testValidOrganismeType1_2NormeB2
     *
     * @dataProvider getClefs
     *
     * @param string $code
     * @param int $clef
     * @param boolean $resultat
     *
     * @return void
     */
    public function testValidOrganismeType12NormeB2($code="",$clef=0,$resultat=false)
    {
        $this->assertEquals($resultat, OrganismeType12NormeB2::validate($code, $clef));
    }

}
