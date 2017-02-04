<?php 
require "MatematicaMaluca.php";

class MatematicaMalucaTest {
	
    public function testMultiplicaMaior30() 
    {
        $matematica = new MatematicaMaluca();
        $this->assertEquals(50*4, $matematica->contaMaluca(50));
    }

    public function testMultiplicaMaiorQue10MenorQue30() 
    {
        $matematica = new MatematicaMaluca();
        $this->assertEquals(20*3, $matematica->contaMaluca(20));
    }

    public function testDeveMultiplicaMenor10() 
    {
        $matematica = new MatematicaMaluca();
        $this->assertEquals(5*2, $matematica->contaMaluca(5));
    }

}