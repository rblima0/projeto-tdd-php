<?php
require "Lance.php";
require "Leilao.php";
require "Usuario.php";
require "FiltroDeLances.php";

class FiltroDeLancesTest extends PHPUnit_Framework_TestCase {

    /*
    public function testDeveSelecionarLancesEntre1000E3000() {
        $carlos = new Usuario("Carlos");

        $filtro = new FiltroDeLances();
        $lances = [];
        $lances[] = new Lance($carlos,2000);
        $lances[] = new Lance($carlos,1000);
        $lances[] = new Lance($carlos,3000);
        $lances[] = new Lance($carlos,800);

        $resultado = $filtro->filtra($lances);

        $this->assertEquals(1, count($resultado));
        $this->assertEquals(2000, $resultado[0]->getValor(), 0.00001);
    }

    public function testDeveSelecionarLancesEntre500E700() {
        $carlos = new Usuario("Carlos");

        $filtro = new FiltroDeLances();
        $lances = [];
        $lances[] = new Lance($carlos,600);
        $lances[] = new Lance($carlos,500);
        $lances[] = new Lance($carlos,700);
        $lances[] = new Lance($carlos,800);

        $resultado = $filtro->filtra($lances);
        $this->assertEquals(1, count($resultado));
        $this->assertEquals(600, $resultado[0]->getValor(), 0.00001);
    }

    public function testDeveSelecionarLancesMaiores5000() {
        $carlos = new Usuario("Carlos");

        $filtro = new FiltroDeLances();

        $lances = [];
        $lances[] = new Lance($carlos, 5500);

        $resultado = $filtro->filtra($lances);

        $this->assertEquals(1, count($resultado));
        $this->assertEquals(5500, $resultado[0]->getValor(), 0.00001);
    }

    public function testDeveEliminarMenoresQue500() {
	    $carlos = new Usuario("Carlos");

	    $filtro = new FiltroDeLances();

	    $lances = [];
	    $lances[] = new Lance($carlos, 400);
	    $lances[] = new Lance($carlos, 300);

	    $resultado = $filtro->filtra($lances);
	    $this->assertEquals(0, count($resultado));
	}

	public function testDeveEliminarEntre3000E5000() {
	    $carlos = new Usuario("Carlos");

	    $filtro = new FiltroDeLances();

	    $lances = [];
	    $lances[] = new Lance($carlos, 4000);
	    $lances[] = new Lance($carlos, 3500);

	    $resultado = $filtro->filtra($lances);
	    $this->assertEquals(0, count($resultado));
	}
    */

    
}