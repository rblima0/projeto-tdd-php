<?php
require 'Lance.php';
require 'CriadorDeLeilao.php';
require 'USuario.php';

class LanceTest extends PHPUnit_Framework_TestCase {
	 /**
     * @expectedException InvalidArgumentException
     */
	public function testCasoValorIgualZero() {
		new Lance(new Usuario("John Doe"), 0);
	}


 	/**
     * @expectedException InvalidArgumentException
     */
	public function testCasoValorNegativo(){
		new Lance(new Usuario("John Doe"), -10);
	}
} ?>