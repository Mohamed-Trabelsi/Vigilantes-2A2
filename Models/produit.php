<?php
require_once("../config.php");
class produit
{
	private $idProduit;
	private $nomProduit;
	private $categ;
	private $descrProduit;
	private $prixProduit;
	private $imgProduit;
	private $dateAProduit;
	private $qte;
	
	public function __construct($nomProduit,$categ,$descrProduit,$prixProduit,$imgProduit,$dateAProduit,$qte)
	
	{
		$this->nomProduit=$nomProduit;
		$this->categ=$categ;
		$this->descrProduit=$descrProduit;
		$this->prixProduit=$prixProduit;
		$this->imgProduit=$imgProduit;
		$this->dateAProduit=$dateAProduit;
		$this->qte=$qte;
		
		
		
		
	}
	        
	public function getidProduit(){return $this->idProduit;}
	public function getnomProduit(){return $this->nomProduit;}
	public function getCateg(){return $this->categ;}
	public function getdescrProduit(){return $this->descrProduit;}
	public function getprixProduit(){return $this->prixProduit;}
	public function getimgProduit(){return $this->imgProduit;}
	public function getdateAProduit(){return $this->dateAProduit;}
	public function getQte(){return $this->qte;}
	

	public function setnomProduit($nomProduit){$this->nomProduit=$nomProduit;}
	public function setCateg($categ){$this->categ=$categ;}
	public function setdescrProduit($descrProduit){$this->descrProduit=$descrProduit;}
	public function setprixProduit($prixProduit){$this->prixProduit=$prixProduit;}	
	public function setimgProduit($imgProduit){$this->imgProduit=$imgProduit;}
	public function setdateAProduit($dateAProduit){$this->dateAProduit=$dateAProduit;}
	public function setQte($qte){$this->qte=$qte;}
	
	
}

?>