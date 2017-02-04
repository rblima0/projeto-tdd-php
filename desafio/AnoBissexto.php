<?php 
class AnoBissexto {

	private $bissexto = false;

	public function ehBissexto($ano){
		if(($ano % 4) == 0 && ($ano % 100) !=0 || ($ano % 400) == 0) {
			$bissexto = true;
		} else {
			$bissexto = false;	
		}
	}

    public function getBissexto()
    {
        return $this->bissexto;
    }
} ?>