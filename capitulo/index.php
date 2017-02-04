<?php 
	/*
	function autoloadDeClasses($nomeDaClasse) {
		require $nomeDaClasse.".php";
	}
	spl_autoload_register("autoloadDeClasses");
	*/

	require "Lance.php";
	require "Leilao.php";
	require "Usuario.php";
	require "Avaliador.php";
	require "AvaliadorTest.php";

	$test = new AvaliadorTest();
	$test->test();


 ?>