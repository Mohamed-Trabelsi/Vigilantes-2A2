<?php
include_once "../config.php";
class panierC
{
    function ajouterPanier($panier){
        $sql="insert into panier (idUser,id_produit,quantite,prix_total) values (:idUser,:id_produit,:quantite,:prix_total)";
        $pdo = getConnexion();
        try{
            $req=$pdo->prepare($sql);

            $idUser=$panier->get_idUser();
            $id_produit=$panier->get_id_produit();
            $quantite=$panier->get_quantite();
            $prix_total=$panier->get_prix_total();
            $req->bindValue(':idUser',$idUser);
            $req->bindValue(':id_produit',$id_produit);
            $req->bindValue(':quantite',$quantite);
            $req->bindValue(':prix_total',$prix_total);

            $req->execute();

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage()) ;
        }

    }

    function afficherPanier($idUser){
        $sql="SElECT * From panier INNER JOIN produit ON panier.id_produit=produit.idP where idUser='$idUser'";
        $pdo = getConnexion();
        try{
            $liste=$pdo->query($sql);
            return $liste->fetchAll();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


    function supprimerPanier($idUser,$id_produit){
        $sql="DELETE FROM panier where (idUser=:idUser and id_produit=:id_produit)";
        $pdo = getConnexion();
        $req=$pdo->prepare($sql);
        $req->bindValue(':idUser',$idUser);
        $req->bindValue(':id_produit',$id_produit);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur supprimerPanier: '.$e->getMessage());
        }
    }
    function deleteAllcommandes($idUser){
        $sql="DELETE FROM panier where (idUser=:idUser)";
        $pdo = getConnexion();
        $req=$pdo->prepare($sql);
        $req->bindValue(':idUser',$idUser);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur supprimerPanier: '.$e->getMessage());
        }
    }

    function modifierPanier($panier,$x,$prix){
        $sql="UPDATE panier SET quantite=:quantite, prix_total=:prix_total WHERE (idUser=:idUser and id_produit=:id_produit)";
        $pdo = getConnexion();
        try{
            $req=$pdo->prepare($sql);
            $idUser=$panier->get_idUser();
            $id_produit=$panier->get_id_produit();
            $quantite=$panier->get_quantite()+1;
            $prix_total=$panier->get_prix_total()+$prix;
            $req->bindValue(':idUser',$idUser);
            $req->bindValue(':id_produit',$id_produit);
            $req->bindValue(':quantite',$quantite);
            $req->bindValue(':prix_total',$prix_total);
            $s=$req->execute();
        }
        catch (Exception $e){
            die(" Erreur modiferpanier ! ".$e->getMessage()) ;
        }
    }
    function modifierPanierminus($panier,$x,$prix){
        $sql="UPDATE panier SET quantite=:quantite, prix_total=:prix_total WHERE (idUser=:idUser and id_produit=:id_produit)";
        $pdo = getConnexion();
        try{
            $req=$pdo->prepare($sql);
            $idUser=$panier->get_idUser();
            $id_produit=$panier->get_id_produit();
            $quantite=$panier->get_quantite()-1;
            $prix_total=$panier->get_prix_total()-$prix;
            $req->bindValue(':idUser',$idUser);
            $req->bindValue(':id_produit',$id_produit);
            $req->bindValue(':quantite',$quantite);
            $req->bindValue(':prix_total',$prix_total);
            $s=$req->execute();
        }
        catch (Exception $e){
            die(" Erreur modiferpanier ! ".$e->getMessage()) ;
        }
    }
    function recupererPanier($idUser,$id_prod){

        $sql="SELECT * from panier where (idUser='$idUser') and (id_produit='$id_prod')";
        $pdo = getConnexion();
        try{
            $liste=$pdo->query($sql);
            return $liste->fetch();
        }
        catch (Exception $e){
            die('Erreur recupere panier: '.$e->getMessage());
        }
    }


}
?>