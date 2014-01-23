<?php

namespace IsoCodes\Tests;

use IsoCodes\OrganismeType12NormeB2;

/**
 * @covers IsoCodes\OrganismeType12NormeB2
 */
class OrganismeType12NormeB2Test  extends \PHPUnit_Framework_TestCase
{

    public function __construct()
    {
        parent::__construct();
        $this->setName( "Organisme Type 1/2 Norme B2 unit test case" );
    }

    protected function setUp()
    {
        parent::setUp();
    }

    /**
     * @dataProvider fournisseur
     */
    public function clefs()
    {
        return array(
            array("76031208",2,true),
            array("76031208","2",false),
            array("76031208",0,false),
            array("76031208",null,false),
            array(1,1,false),
            array(null,2,false),
            array(null,0,false),
            array(null,null,false),
        );
    }

    /**
     * testValidOrganismeType1_2NormeB2
     *
     * @dataProvider clefs
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
