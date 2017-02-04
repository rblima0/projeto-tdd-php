<?php
require 'AnoBissexto.php';

class AnoBissextoTest extends PHPUnit_Framework_TestCase {

	public function testEhAnoBissexto(){

		$anoBissexto = new AnoBissexto();
		$anoBissexto->ehBissexto(2000);

		$this->AssertEquals(false, $anoBissexto->getBissexto());
	}

} ?>