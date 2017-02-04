<?php
require_once "Avaliador.php";
require_once 'Usuario.php';
require_once 'Leilao.php';
require_once 'Lance.php';
require_once 'CriadorDeLeilao.php';

class AvaliadorTest extends PHPUnit_Framework_TestCase {

    private $leiloeiro;
    private $maria;
    private $jose;
    private $joao;

    public function testDeveEntenderLancesEmOrdemCrescente() {
        $criador = new CriadorDeLeilao();
        $leilao = $criador->para("Playstation 3 Novo")->lance($this->joao, 250)->lance($this->jose, 300)->lance($this->maria, 400)->constroi();

        $this->leiloeiro->avalia($leilao);

        $this->assertEquals(400.0, $leiloeiro->getMaiorLance(), 0.00001);
        $this->assertEquals(250.0, $leiloeiro->getMenorLance(), 0.00001);
    }

    public function testDeveEntenderLeilaoComApenasUmLance() {
        $criador = new CriadorDeLeilao();
        Leilao leilao = $criador->para("Playstation 3 Novo")->lance(joao, 1000)->constroi();

        $this->leiloeiro->avalia($leilao);

        $this->assertEquals(1000.0, $leiloeiro->getMaiorLance(), 0.00001);
        $this->assertEquals(1000.0, $leiloeiro->getMenorLance(), 0.00001);
    }

    public function testDeveEncontrarOsTresMaioresLances() {
        $criador = new CriadorDeLeilao();
        $leilao = $criador->
            para("Playstation 3 Novo")
            ->lance($this->joao, 100)
            ->lance($this->maria, 200)
            ->lance($this->joao, 300)
            ->lance($this->maria, 400)
            ->constroi();

        $this->leiloeiro->avalia($leilao);

        $maiores = $this->leiloeiro->getTresMaiores();
        $this->assertEquals(3, maiores.size());
        $this->assertEquals(400.0, $maiores[0]->getValor(), 0.00001);
        $this->assertEquals(300.0, $maiores[1]->getValor(), 0.00001);
        $this->assertEquals(200.0, $maiores[2]->getValor(), 0.00001);
    }

} ?>