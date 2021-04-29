<?php



class commande
{	
	private $id_client;
	private $date_commande;
	private $prix_commande;
	private $etat_commande;
	

function __construct($id_client,$prix_commande,$etat_commande,$date_commande)
{		
	
	$this->id_client=$id_client;
	$this->prix_commande=$prix_commande;
	$this->etat_commande=$etat_commande;
	$this->date_commande=$date_commande;
}


function Getid_client()
{
	return $this->id_client;
}
function Getprixcommande()
{
	return $this->prix_commande;
}
function Getetat_commande()
{
	return $this->etat_commande;
}

function Getdatecommande()
{
	return $this->date_commande;
}





function Setdes($prix_commande)
{
$this->prix_commande=$prix_commande;
}
function Setetat_commande($etat_commande)
{
$this->etat_commande=$etat_commande;
}
function Setdate_commande($date_commande)
{
$this->date_commande=$date_commande;
}




}



 ?>



 