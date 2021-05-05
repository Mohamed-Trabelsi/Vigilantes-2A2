<?php
include "../assets/panier.php";
include "../controller/panierC.php";
include "../controller/ProduitC.php";
$prod= (new panierC())->recupererPanier('1234',$_GET['id_produit']);
$prd= (new ProduitC())->recupererProduit($_GET['id_produit']);
$panier = new panier($prod['id_client'],$prod['id_produit'],$prod['quantite'],$prod['prix_total']);
var_dump($panier);
(new panierC())->modifierPanier($panier,$prod,$prd['prix']);
header('location:cart_items.php');
