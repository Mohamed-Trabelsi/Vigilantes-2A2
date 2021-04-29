<?PHP
include "../controller/panierC.php";

$panierC=new panierC();

if (isset($_POST['id_client']) and isset($_POST['idproduit'])){
	$panierC->supprimerPanier($_POST["id_client"],$_POST["idproduit"]);
	header('Location: afficherPanier.php');
}

?>