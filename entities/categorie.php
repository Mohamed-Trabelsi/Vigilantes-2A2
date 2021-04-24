<?php

class categorie
{
	private $idCategory;
	private $nomCategory;
	private $dateAC;
	public function __construct($nomCategory,$dateAC)
	
	{
		$this->nomCategory=$nomCategory;
		$this->dateAC=$dateAC;
	}
	public function getidCategory(){return $this->idCategory;}
	public function getnomCategory(){return $this->nomCategory;}
	public function getdateAC(){return $this->dateAC;}
	public function setnomCategory($nomCategory){$this->nomCategory=$nomCategory;}
	public function setdateAC($dateAC){$this->dateAC=$dateAC;}	
}
?>