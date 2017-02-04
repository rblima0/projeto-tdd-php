<?php 
class Avaliador {

    private $maiores;
    private $maiorDeTodos = -INF;
    private $menorDeTodos = INF;

    public function avalia(Leilao $leilao) {
        if(count($leilao->getLances()) <= 0) {
            throw new Exception("Um leilão precisa ter pelo menos um lance");
        }
        foreach($leilao->getLances() as $lance) {

            if($lance->getValor() > $this->maiorDeTodos)
                $this->maiorDeTodos = $lance->getValor();
            if($lance->getValor() < $this->menorDeTodos)
                $this->menorDeTodos = $lance->getValor();

        }

        $this->pegaOsMaioresNo($leilao);
    }

    // resto do codigo aqui
} ?>