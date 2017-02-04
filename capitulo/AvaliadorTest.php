<?php 
require "Lance.php";
require "Leilao.php";
require "Usuario.php";
require "Avaliador.php";

class AvaliadorTest extends PHPUnit_Framework_TestCase {

	/*
	public function testAceitaLeilaoEmOrdemCrescente(){

		$leilao = new Leilao("Microondas");

		$rodrigo = new Usuario("Rodrigo");
		$kathy = new Usuario("Kathy");
		$ana = new Usuario("Ana");

		$leilao->propoe(new Lance($ana,250));
		$leilao->propoe(new Lance($kathy,300));
		$leilao->propoe(new Lance($rodrigo,400));		

		$leiloeiro = new Avaliador();
		$leiloeiro->avalia($leilao);

		$maiorEsperado = 400;
        $menorEsperado = 250;

		//var_dump($leiloeiro->getMaiorLance());
		//var_dump($leiloeiro->getMenorLance());

		//$this->assertEquals($leiloeiro->getMaiorLance(),$maiorEsperado);
        //$this->assertEquals($leiloeiro->getMenorLance(),$menorEsperado);

        $this->assertEquals($maiorEsperado, $leiloeiro->getMaiorLance(), 0.0001);
        $this->assertEquals($menorEsperado, $leiloeiro->getMenorLance(), 0.0001);
        //$this->assertEquals($medioEsperado, $leiloeiro->getMedioLance(), 0.0001);
	}

    public function testAceitaLeilaoEmOrdemDecrescente(){

    	$leilao = new Leilao("Fogão");

		$rodrigo = new Usuario("Rodrigo");
		$kathy = new Usuario("Kathy");
		$ana = new Usuario("Ana");

		$leilao->propoe(new Lance($rodrigo,400));
		$leilao->propoe(new Lance($kathy,300));
		$leilao->propoe(new Lance($ana,250));		

		$leiloeiro = new Avaliador();
		$leiloeiro->avalia($leilao);

		$maiorEsperado = 400;
        $menorEsperado = 250;

		$this->assertEquals($leiloeiro->getMaiorLance(),$maiorEsperado);
        $this->assertEquals($leiloeiro->getMenorLance(),$menorEsperado);
    }

    public function testAceitaLeilaoSemOrdem(){

    	$leilao = new Leilao("Geladeira");

		$rodrigo = new Usuario("Rodrigo");
		$kathy = new Usuario("Kathy");
		$ana = new Usuario("Ana");
		$lucas = new Usuario("Lucas");
		$carlos = new Usuario("Carlos");
		$josi = new Usuario("Josi");

		$leilao->propoe(new Lance($rodrigo,200));
		$leilao->propoe(new Lance($kathy,450));
		$leilao->propoe(new Lance($ana,120));
		$leilao->propoe(new Lance($lucas,700));
		$leilao->propoe(new Lance($carlos,630));
		$leilao->propoe(new Lance($josi,230));

		$leiloeiro = new Avaliador();
		$leiloeiro->avalia($leilao);

		$maiorEsperado = 700;
        $menorEsperado = 120;

		$this->assertEquals($leiloeiro->getMaiorLance(),$maiorEsperado);
        $this->assertEquals($leiloeiro->getMenorLance(),$menorEsperado);
    }

    public function testAceitaLeilaoComUmLance(){

    	$rodrigo = new Usuario("Rodrigo");

    	$leilao = new Leilao("Caderno");

    	$leilao->propoe(new Lance($rodrigo, 250));

    	$leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);

        $maiorEsperado = 250;
        $menorEsperado = 250;

        $this->assertEquals($leiloeiro->getMaiorLance(),$maiorEsperado);
        $this->assertEquals($leiloeiro->getMenorLance(),$menorEsperado);
    }

	public function testAceitaLeilaoEmOrdemCrescenteComOutrosValores() {

        $joao = new Usuario("Joao");
        $renan = new Usuario("Renan");
        $felipe = new Usuario("Felipe");

        $leilao = new Leilao("Mochila");

        $leilao->propoe(new Lance($joao,1000));
        $leilao->propoe(new Lance($renan,2000));
        $leilao->propoe(new Lance($felipe,3000));

        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);

        $maiorEsperado = 400;
        $menorEsperado = 250;

        $this->assertEquals($leiloeiro->getMaiorLance(),$maiorEsperado);
        $this->assertEquals($leiloeiro->getMenorLance(),$menorEsperado);
    }

    public function testLeilaoCom5Lances(){

    	$carlos = new Usuario("Carlos");
    	$lucas = new Usuario("Lucas");

    	$leilao = new leilao("Smartphone");

    	$leilao->propoe(new Lance($lucas, 1500));
    	$leilao->propoe(new Lance($carlos, 1800));
    	$leilao->propoe(new Lance($lucas, 1900));
    	$leilao->propoe(new Lance($carlos, 2000));
    	$leilao->propoe(new Lance($lucas, 2500));

    	$leiloeiro = new Avaliador;
    	$leiloeiro->avalia($leilao);

	 	$maiores = $leiloeiro->getTresMaiores();

    	$terceiroMaiorEsperado = 1900;
    	$segundoMaiorEsperado = 2000;
    	$primeiroMaiorEsperado = 2500;

		$this->assertEquals(3, count($maiores));
		$this->assertEquals($primeiroMaiorEsperado, $maiores[0]->getValor(), 0.00001 );
		$this->assertEquals($segundoMaiorEsperado, $maiores[1]->getValor(), 0.00001 );
		$this->assertEquals($terceiroMaiorEsperado, $maiores[2]->getValor(), 0.00001 );
    }

    public function testLeilaoCom2Lances() {

	    $joao   = new Usuario("Carlos");
	    $maria  = new Usuario("Lucas");

	    $leilao = new Leilao("Sapato");

	    $leilao->propoe( new Lance($joao , 100.0) );
	    $leilao->propoe( new Lance($maria, 200.0) );

	    $leiloeiro = new Avaliador();
	    $leiloeiro->avalia($leilao);

	    $maiores = $leiloeiro->getTresMaiores();

	    $this->assertEquals(2, count($maiores));
	    $this->assertEquals(200, $maiores[0]->getValor(), 0.00001 );
	    $this->assertEquals(100, $maiores[1]->getValor(), 0.00001 );
	}

	public function testSemLances() {

	    $leilao = new Leilao("Luva");

	    $leiloeiro = new Avaliador();
	    $leiloeiro->avalia($leilao);

	    $maiores = $leiloeiro->getTresMaiores();

	    $this->assertEquals(0, count($maiores));
	}
	

	public function testNaoDeveAceitarDoisLancesSeguidosDoMesmoUsuario(){
	    $leilao = new Leilao("Macbook Pro 15");

		$steveJobs = new Usuario("Steve Jobs");

		$leilao->propoe(new Lance($steveJobs, 2000));
		$leilao->propoe(new Lance($steveJobs, 3000));

		$this->assertEquals(1, count($leilao->getLances()));
		$this->assertEquals(2000, $leilao->getLances()[0]->getValor(), 0.00001);
    }*/

    public function naoDeveAceitarMaisDoQue5LancesDeUmMesmoUsuario(){
    	$leilao = new Leilao("Mac");
        $steveJobs = new Usuario("Steve Jobs");
        $billGates = new Usuario("Bill Gates");

        $leilao->propoe(new Lance($steveJobs, 2000));
        $leilao->propoe(new Lance($billGates, 3000));
        $leilao->propoe(new Lance($steveJobs, 4000));
        $leilao->propoe(new Lance($billGates, 5000));
        $leilao->propoe(new Lance($steveJobs, 6000));
        $leilao->propoe(new Lance($billGates, 7000));
        $leilao->propoe(new Lance($steveJobs, 8000));
        $leilao->propoe(new Lance($billGates, 9000));
        $leilao->propoe(new Lance($steveJobs, 10000));
        $leilao->propoe(new Lance($billGates, 11000));

        // deve ser ignorado
        $leilao->propoe(new Lance($steveJobs, 12000));

        $this->assertEquals(10, count($leilao->getLances()));

	    $ultimo = count($leilao->getLances())- 1;

	    $this->assertEquals(999, $leilao->getLances()[$ultimo]->getValor(), 0.00001);
    }

}



