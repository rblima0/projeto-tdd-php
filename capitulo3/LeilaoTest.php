<?php
require 'Usuario.php';
require 'Lance.php';
require 'Leilao.php';

class LeilaoTest extends PHPUnit_Framework_TestCase {

	public function testDeveProporUmLance(){
		$leilao = new Leilao("Notebook Lenovo");
		$this->AssertEquals(0, count($leilao->getLances()));

		$rodrigo = new Usuario("Rodrigo");
		$leilao->propoe(new Lance($rodrigo, 2000));

		$this->AssertEquals(1, count($leilao->getLances()));
		$this->AssertEquals(2000, $leilao->getLances()[0]->getValor());
	}

	public function testDobraUltimoLance(){

		$leilao = new Leilao("Smartphone XM23");
		$rodrigo = new Usuario("Rodrigo");
		$ana = new Usuario("Ana");

		$leilao->propoe(new Lance($rodrigo, 2000));
		$leilao->propoe(new Lance($ana, 3000));
		$leilao->dobraLance($rodrigo);

		$this->AssertEquals(4000, $leilao->getLances()[2]->getValor());
	}

	public function testNaoDeveDobrarCasoNaoHajaLanceAnterior() {
        $leilao = new Leilao("Macbook Pro 15");
        $rodrigo = new Usuario("Rodrigo");

        $leilao->dobraLance($rodrigo);

        $this->assertEquals(0, count($leilao->getLances()));
    }

} ?>