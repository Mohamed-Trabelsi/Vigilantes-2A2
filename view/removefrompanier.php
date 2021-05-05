<?php

include "../assets/panier.php";
include "../controller/panierC.php";

$panier= (new panierC())->supprimerPanier('1234',$_GET['id_prod']);
header('Location: cart_items.php');
?>