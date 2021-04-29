<?php
include "../entities/Client.php";
include "../controller/Gestion_client.php";
if (isset($_POST['id']) and isset($_POST['adresse_email']) and isset($_POST['motdepasse']) and isset($_POST['pays']) and isset($_POST['ville']) and isset($_POST['code_postal'])){
$g=new Gestion_client();
$compte= new compte($_POST['id'],$_POST['motdepasse']);
$compte->setAdresse_email($_POST['adresse_email']);
$Client_inscrit=new Client($compte,$_POST['pays'],$_POST['ville'],$_POST['code_postal']);
$g->ajouterClient($Client_inscrit,$compte);
header('Location: login.php');
}else{
	echo "champs non valid";
}

?>