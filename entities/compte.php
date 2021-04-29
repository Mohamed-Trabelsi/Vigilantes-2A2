<?php
/**
 * 
 */
include_once ('../../config.php');
class compte {
	private $id;
	private $motdepasse;
	private $adresse_email;
	private $type;
	public $conn;

	
	public function __construct($id,$motdepasse)
	{
		$this->id=$id;
		$this->motdepasse=$motdepasse;
	}
	function getId(){
		return $this->id;
	}
	function getmotdepasse(){
		return $this->motdepasse;
	}
	function gettype(){
		return $this->type;
	}
	function setId($id){
    $this->id=$id;
	}
		function setType($type){
		$this->type=$type;
	}

    function setmotdepasse($motdepasse){
    $this->motdepasse=$motdepasse;
	}

	function getAdresse_email(){
		return $this->adresse_email;
	}
	function setAdresse_email($adresse_email){
    $this->adresse_email=$adresse_email;
	}
	function setconn($conn){
			$this->conn= $conn;
}
	public function Logedin($conn,$id,$motdepasse)
	{
		$req="select * from compte where id='$id' && motdepasse='$motdepasse'";
		$rep=$conn->query($req);
		return $rep->fetchAll();
	}
}
?>