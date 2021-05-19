<?php

include "../controller/CommandeC.php";
include "../models/Commande.php";
include "../controller/panierC.php";
include "../controller/produit.php";
session_start();
$produit = new gererProduit();
$panier = new panierC();
$touslesitems= $panier->afficherPanier($_SESSION['a']);
$prix_globale= 0;
$str = "";
foreach($touslesitems as $x){
$str=$str.$x['nomP'].',';
    $prix_globale+=$x['prix_total'];
}
$str = rtrim($str, ", ");
$commande = new commande($_SESSION['a'],$str,$prix_globale,$_POST['mode_payement'],'commande pour le client n°= '.$_SESSION['a'].'' );
(new CommandeC())->ajouterCommande($commande);

$panier->deleteAllcommandes($_SESSION['a']);
echo '<script>
alert("Votre commande à ete passé avec success!");
location.href="showp.php";
</script>';
?>