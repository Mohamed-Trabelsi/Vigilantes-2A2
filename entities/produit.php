<?PHP
class produit{
	private $idprod;
	private $nomprod;
	private $description;
	private $prixkg;
	private $disponibilite;
	private $qtedispo;
	private $lienimage;
	private $idcat;

	function __construct($idprod,$nomprod,$description,$prixkg,$disponibilite,$qtedispo,$lienimage,$idcat){
		$this->idprod=$idprod;
		$this->nomprod=$nomprod;
		$this->description=$description;
		$this->prixkg=$prixkg;
		$this->disponibilite=$disponibilite;
		$this->qtedispo=$qtedispo;
		$this->lienimage=$lienimage;
		$this->idcat=$idcat;
		
	}
	
	function getIdprod(){
		return $this->idprod;
	}
	function getNomprod(){
		return $this->nomprod;
	}
	function getDescription(){
		return $this->description;
	}
	function getPrixkg(){
		return $this->prixkg;
	}
	function getDisponibilite(){
		return $this->disponibilite;
	}
	function getQtedispo(){
		return $this->qtedispo;
	}
	function getLienimage(){
		return $this->lienimage;
	}
	function getIdcat(){
		return $this->idcat;
	}

	function setNomprod($nomprod){
		$this->nomprod=$nomprod;
	}
	function setDescription($description){
		$this->description=$description;
	}
	function setPrixkg($prixkg){
		$this->prixkg=$prixkg;
	}
	function setDisponibilite($disponibilite){
		$this->disponibilite=$disponibilite;
	}
	function setQtedispo($qtedispo){
		$this->qtedispo=$qtedispo;
	}
	function setLienimage($lienimage){
		$this->lienimage=$lienimage;
	}
	function setIdcat($idcat){
		$this->idcat=$idcat;
	}
	
}

?>