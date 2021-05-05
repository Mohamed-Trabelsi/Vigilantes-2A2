<?php

include "../controller/CommandeC.php";
include "../assets/Commande.php";
include "../controller/panierC.php";
include "../controller/produitC.php";
$produit = new ProduitC();
$panier = new panierC();
$touslesitems= $panier->afficherPanier('1234');
$prix_globale= 0;
$str = "";
foreach($touslesitems as $x){
$str=$str.$x['titre'].',';
    $prix_globale+=$x['prix_total'];
}
$str = rtrim($str, ", ");
$commande = new commande('1234',$str,$prix_globale,$_POST['mode_payement'],"commande pour le client n°= 1234");
(new CommandeC())->ajouterCommande($commande);

$panier->deleteAllcommandes('1234');
echo '<script>
alert("Votre commande à ete passé avec success!");
location.href="panier.php";
</script>';
?>