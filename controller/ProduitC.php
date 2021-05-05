<?php

include_once "../config.php";
class ProduitC
{
    function afficherProduit(){
        $sql="select * From produit";
        $pdo = getConnexion();
        try{
            $sth = $pdo->prepare($sql);
            $sth->execute();
            $liste = $sth->fetchAll();
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function recupererProduit($id){
        $sql="SELECT * from produit where id= $id";
        $pdo = getConnexion();
        try{
            $sth = $pdo->prepare($sql);
            $sth->execute();
            $liste = $sth->fetch();

            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
}