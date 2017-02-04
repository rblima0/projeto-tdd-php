<?php
class Avaliador {

    public $maiorValor = -INF;
    public $menorValor = INF;
    public $medioValor = 0;

   public function avalia(Leilao $leilao) {
            foreach($leilao->getLances() as $lance) {
                if($lance->getValor() > $this->maiorValor)
                    $this->maiorValor = $lance->getValor();
                if($lance->getValor() < $this->menorValor)
                    $this->menorValor = $lance->getValor();
            }

            $this->pegaOsMaioresNo($leilao);
   }

  	public function pegaOsMaioresNo(Leilao $leilao) {

            $lances = $leilao->getLances();
            usort($lances,function ($a,$b) {
                if($a->getValor() == $b->getValor()) return 0;
                return ($a->getValor() < $b->getValor()) ? 1 : -1;
            });

            $this->maiores = array_slice($lances, 0,3);
    }


    public function propoe(Lance $lance){
        if(count($lances) == 0 || $this->podeDarLance($lance->getUsuario())) {
            $lances[] = $lance;
        }
    }

    private function podeDarLance(Usuario $usuario){
        return !$this->ultimoLanceDado()->getUsuario()->getNome() == $usuario->getNome() && $this->qtdDelancesDo($usuario) < 5;
    }

    private function qtdDelancesDo(Usuario $usuario){
        $total = 0;

        foreach($lances as $lance) {
            if($lance->getUsuario()->getNome() == $usuario->getNome()) $total++;
        }

        return $total;
    }

    private function ultimoLanceDado(){
        return $lances[count($lances)-1];
    }

    public function getTresMaiores() {
        return $this->maiores;
    }

	public function getMaiorLance(){
		return $this->maiorValor;
	}

	public function getMenorLance(){
		return $this->menorValor;
	}

	public function getMedioLance(){
		return $this->medioValor;
	}
}