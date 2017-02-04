<?php 
class LeilaoTest extends PHPUnit_Framework_TestCase {

    public function testDeveReceberUmLance() {
        $criador = new CriadorDeLeilao();
        $leilao = $criador->para("Macbook Pro 15")->constroi();
        $this->assertEquals(0, count($leilao->getLances()));

        $leilao->propoe(new Lance(new Usuario("Steve Jobs"), 2000));

        $this->assertEquals(1, count($leilao->getLances()));
        $this->assertEquals(2000.0, $leilao->getLances()[0]->getValor(), 0.00001);
    }

    public function testDeveReceberVariosLances() {
        $criador = new CriadorDeLeilao();
        $leilao = $criador->para("Macbook Pro 15")->lance(new Usuario("Steve Jobs"), 2000)->lance(new Usuario("Steve Wozniak"), 3000)->constroi();

        $this->assertEquals(2, count($leilao->getLances()));
        $this->assertEquals(2000.0, $leilao->getLances()[0]->getValor(), 0.00001);
        $this->assertEquals(3000.0, $leilao->getLances()[1]->getValor(), 0.00001);
    }

    public function testNaoDeveAceitarDoisLancesSeguidosDoMesmoUsuario() {
        $steveJobs = new Usuario("Steve Jobs");
        $criador = new CriadorDeLeilao();
        $leilao = $criador->
            para("Macbook Pro 15")
            ->lance($steveJobs, 2000.0)
            ->lance($steveJobs, 3000.0)
            ->constroi();

        $this->assertEquals(1, count($leilao->getLances()).size());
        $this->assertEquals(2000.0, leilao.getLances()[0]->getValor(), 0.00001);
    }

    public function testNaoDeveAceitarMaisDoQue5LancesDeUmMesmoUsuario() {
        $steveJobs = new Usuario("Steve Jobs");
        $billGates = new Usuario("Bill Gates");

        $criador = new CriadorDeLeilao();
        $leilao = $criador->para("Macbook Pro 15")
                ->lance($steveJobs, 2000)
                ->lance($billGates, 3000)
                ->lance($steveJobs, 4000)
                ->lance($billGates, 5000)
                ->lance($steveJobs, 6000)
                ->lance($billGates, 7000)
                ->lance($steveJobs, 8000)
                ->lance($billGates, 9000)
                ->lance($steveJobs, 10000)
                ->lance($billGates, 11000)
                ->lance($steveJobs, 12000)
                ->constroi();

        $this->assertEquals(10, count($leilao->getLances()));
        $ultimo = count($leilao->getLances()) - 1;
        $this->assertEquals(11000.0, $leilao->getLances()[$ultimo]->getValor(), 0.00001);
    }    
} ?>