<?PHP
include "../entities/panier.php";
include "../controller/panierC.php";
session_start();
if ( isset($_GET['idproduit']) and isset($_GET['prix_total']))
{ $quantite=1;
  $id_client='1234';
$p1=new panier($_SESSION['id'],$_GET['idproduit'],$quantite,$_GET['prix']);
$panier1C=new panierC();
$panier1C->ajouterPanier($p1);
header('Location: afficherproduit.php');
	
}
else
{
	echo "vérifier les champs";
}


?>