<?PHP
class categorie{
	private $idcat;
	private $nom;
	private $saison;
	private $infosgenerales;

	function __construct($idcat,$nom,$saison,$infosgenerales){
		$this->idcat=$idcat;
		$this->nom=$nom;
		$this->saison=$saison;
		$this->infosgenerales=$infosgenerales;
		
	}
	
	function getIdcat(){
		return $this->idcat;
	}
	function getNom(){
		return $this->nom;
	}
	function getSaison(){
		return $this->saison;
	}
	function getInfosgenerales(){
		return $this->infosgenerales;
	}

	function setNom($nom){
		$this->nom=$nom;
	}
	function setSaison($saison){
		$this->saison=$saison;
	}
	function setInfogenerales($infosgenerales){
		$this->infosgenerales=$infosgenerales;
	}
	
	
}

?>