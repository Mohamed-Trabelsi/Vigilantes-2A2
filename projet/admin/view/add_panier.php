<?PHP
include "../models/panier.php";
include "../controller/panierC.php";
include "../controller/produit.php";
include "../controller/compteU.php";
session_start();
if(empty($_SESSION['e']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: view.php');
   }
if ( isset($_GET['id_produit']) and isset($_GET['prix_total']))
{
    $quantite=1;
    $idUser= $_SESSION['a'];
    $p1=new panier($idUser,$_GET['id_produit'],$quantite,$_GET['prix_total']);

    $panier1C=new panierC();
    $checkifexist= $panier1C->recupererPanier($_SESSION['a'],$_GET['id_produit']);

    if($checkifexist==false){
        $panier1C->ajouterPanier($p1);

    }else{
        $prd= (new gererProduit())->getProduitById($_GET['idP']);
        $panier1C->modifierPanier($p1,$checkifexist,$prd['prixP']);
    }
 echo '<script>
alert("ajouté au panier");
location.href="showp.php";
</script>';
}
else
{
    echo "vérifier les champs";
}


?>