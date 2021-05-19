<?php

include "../models/panier.php";
include "../controller/panierC.php";
session_start();
$panier= (new panierC())->supprimerPanier($_SESSION['a'],$_GET['id_prod']);
header('Location: cart_items.php');
?>