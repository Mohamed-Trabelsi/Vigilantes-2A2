<?php
include "../models/panier.php";
include "../controller/panierC.php";
include "../controller/produit.php";
session_start();
if (isset ($_GET['id_produit'])){
$prod= (new panierC())->recupererPanier($_SESSION['a'],$_GET['id_produit']);
$prd= (new gererProduit())->getProduitById($_GET['idP']);
$panier = new panier($prod['idUser'],$prod['id_produit'],$prod['quantite'],$prod['prix_total']);
var_dump($panier);
(new panierC())->modifierPanierminus($panier,$prod,$prd['prix']);
}
header('location:cart_items.php');
