<?php
require_once("../config.php");
class produit
{
	private $idProduit;
	private $nomProduit;
	private $prixProduit;
	private $descrProduit;
	private $noteProduit;
	private $imgProduit;
	private $dateAProduit;
	public function __construct($nomProduit,$prixProduit,$descrProduit,$imgProduit,$dateAProduit)
	
	{
		$this->nomProduit=$nomProduit;
		$this->prixProduit=$prixProduit;
		$this->descrProduit=$descrProduit;
		
		//$this->noteProduit=$noteProduit;
		$this->imgProduit=$imgProduit;
		$this->dateAProduit=$dateAProduit;
		
	}
	        
	public function getidProduit(){return $this->idProduit;}
	public function getnomProduit(){return $this->nomProduit;}
	public function getprixProduit(){return $this->prixProduit;}
	public function getdescrProduit(){return $this->descrProduit;}
	//public function getnoteProduit(){return $this->noteProduit;}
	public function getimgProduit(){return $this->imgProduit;}
	public function getdateAProduit(){return $this->dateAProduit;}
	public function setnomProduit($nomProduit){$this->nomProduit=$nomProduit;}
	public function setprixProduit($prixProduit){$this->prixProduit=$prixProduit;}	
	public function setdescrProduit($descrProduit){$this->descrProduit=$descrProduit;}
	//public function setnoteProduit($noteProduit){$this->noteProduit=$noteProduit;}
	public function setimgProduit($imgProduit){$this->imgProduit=$imgProduit;}
	public function setdateAProduit($dateAProduit){$this->dateAProduit=$dateAProduit;}
}

?>