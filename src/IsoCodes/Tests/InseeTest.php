<?php

namespace IsoCodes\Tests;

use IsoCodes\Insee;

class InseeTest extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
        parent::__construct();
        $this->setName( "Insee unit test case" );
    }

    protected function setUp()
    {
        parent::setUp();
    }


    public function testValidInsee()
    {
		$this->assertEquals( Insee::validate( '177022A00100229' ), true ); // Corse
		$this->assertEquals( Insee::validate( '253012A07300444' ), true ); // Corse
        $this->assertEquals( Insee::validate( '177025626004544' ), true );
        $this->assertEquals( Insee::validate( '253077507300483' ), true );
        $this->assertEquals( Insee::validate( '188057208107893' ), true );
    }

    public function testInvalidInsee()
    {
        $this->assertEquals( Insee::validate( '353072B07300483' ), false );
        $this->assertEquals( Insee::validate( '253072C07300483' ), false );
    }

    public function testEmptyInseeAsInvalid()
    {
        $this->assertEquals( Insee::validate( '' ), false );
        $this->assertEquals( Insee::validate( ' ' ), false );
    }

}
?>
