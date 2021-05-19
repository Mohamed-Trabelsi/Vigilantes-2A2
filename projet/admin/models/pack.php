<?php
require_once("../config.php");
class pack
{
	private $idPk;
	private $nomPk;
	private $prod;
	private $descrPk;
	private $prixPk;
	private $imgPk;
	private $dateD;
	private $dateF;
	private $qte;
	
	public function __construct($nomPk,$descrPk,$prixPk,$imgPk,$dateD, $dateF, $qte,$prod)
	
	{
		$this->nomPk=$nomPk;
		$this->prod=$prod;
		$this->descrPk=$descrPk;
		$this->prixPk=$prixPk;
		$this->imgPk=$imgPk;
		$this->dateD=$dateD;
		$this->dateF=$dateF;
		$this->qte=$qte;	
	}
	        
	public function getidPk(){return $this->idPk;}
	public function getnomPk(){return $this->nomPk;}
	public function getprod(){return $this->prod;}
	public function getdescrPk(){return $this->descrPk;}
	public function getprixPk(){return $this->prixPk;}
	public function getimgPk(){return $this->imgPk;}
	public function getdateD(){return $this->dateD;}
	public function getdateF(){return $this->dateF;}
	public function getQte(){return $this->qte;}

	public function setnomPk($nomPk){$this->nomPk=$nomPk;}
	public function setprod($prod){$this->prod=$prod;}
	public function setdescrPk($descrPk){$this->descrPk=$descrPk;}
	public function setprixPk($prixPk){$this->prixPk=$prixPk;}	
	public function setimgPk($imgPk){$this->imgPk=$imgPk;}
	public function setdateD($dateD){$this->dateD=$dateD;}
	public function setdateF($dateF){$this->dateF=$dateF;}
	public function setQtepk($qte){$this->qte=$qte;}
}

?>