<?PHP
include "../controller/commandeC.php";

$commandeC=new commandeC();

if (isset($_POST['id_commande'])){
	$commandeC->supprimerCommande($_POST["id_commande"]);
	header('Location: afficherPanier.php');
}

?>