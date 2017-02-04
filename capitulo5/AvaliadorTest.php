<?php 
require 'Avaliador.php';
require 'CriadorDeLeilao.php';
require 'AvaliadorTest.php';
require 'Usuario.php';

class AvaliadorTest extends PHPUnit_Framework_TestCase {

	/**
     * @expectedException     Exception
     */
	public function testNaoDeveAvaliarLeiloesSemNenhumLanceDado() {
		$criador = new CriadorDeLeilao();
		$leilao = $criador->
		    para("Playstation 3 Novo")
		    ->constroi();

		$this->leiloeiro->avalia($leilao);
	}
}?>