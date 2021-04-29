<?PHP
include "../entities/commande.php";
include "../controller/commandeC.php";
include_once("../entities/mailing.php");
include_once("../controller/Gestion_compte.php");
session_start();

if (isset($_GET['id_client']))
{
$c1=new commande(NULL,$_GET['id_client'],$_GET['prix_total'],$_GET['mode_de_payement']);
$commande1C=new commandeC();
$commande1C->ajouterCommande($c1);
header('Location: confirmationCommande.php');
	
}

else
{
	echo "vérifier les champs";
}


?>