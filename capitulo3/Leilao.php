<?php 
class Leilao {

	private $descricao;
	private $lances;

	public function __construct($descricao){
		$this->descricao = $descricao;
		$this->lances = array();
	}

    public function getDescricao(){
        return $this->descricao;
    }

    public function getLances(){
        return $this->lances;
    }


	public function propoe(Lance $lance){
		$this->lances[] = $lance;
	}

	public function dobraLance(Usuario $usuario) {
        $ultimoLance = $this->ultimoLanceDo($usuario);
        if($ultimoLance!=null) {
            $this->propoe(new Lance($usuario, $ultimoLance->getValor()*2));
        }
    }

    private function ultimoLanceDo(Usuario $usuario) {
        $ultimo = null;
        foreach($this->lances as $lance) {
            if($lance->getUsuario()->getNome() == $usuario->getNome() ) $ultimo = $lance;
        }

        return $ultimo;
    }



} ?>