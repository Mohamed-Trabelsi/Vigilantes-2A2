<?php
/**
 * 
 */
include('compte.php');
class Client extends compte
{	
	private $pays;
	private $ville;
	private $code_postal;
	
	function __construct($compte,$pays,$ville,$code_postal)
	{   parent::__construct($compte->getId(),$compte->getmotdepasse());
		$this->pays=$pays;
		$this->ville=$ville;
		$this->code_postal=$code_postal;
	}

function getPays(){
		return $this->pays;
	}
function getVille(){
		return $this->ville;
	}
	function getCode_postal(){
		return $this->code_postal;
	}
	

function setPays($pays){
    $this->pays=$pays;
	}
function setVille($ville){
    $this->ville=$ville;
	}
	function setCode_postal($code_postal){
	$this->code_postal=$code_postal;
	}


}
?>