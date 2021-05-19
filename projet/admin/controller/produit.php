<?php
require_once("../config.php");
class gererProduit
{

        public function afficherProduit() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM produit'

                );
                
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        } 

        public function deleteProduit($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM produit WHERE idP = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }  

        public function ajouterProduit($produit) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO produit (nomP, categorie, descriptionP, prixP, imageP, dateA, qte) 
                                VALUES (:nomProduit, :categ, :descrProduit, :prixProduit, :imgProduit, :dateAProduit, :qte)'
                );
                $query->execute([
                    'nomProduit' => $produit->getnomProduit(),
                    'categ' => $produit->getCateg(),
                    'descrProduit' => $produit->getdescrProduit(),
                    'prixProduit' => $produit->getprixProduit(),
                    'imgProduit' => $produit->getimgProduit(),
                    'dateAProduit' => $produit->getdateAProduit(),
                    'qte' => $produit->getQte(),
                ]);
                
            } catch (PDOException $e) {
                $e->getMessage();
            }
        } 

        function ajoutp($produit){
        $sql="INSERT INTO produit (nomP, categorie, descriptionP, prixP, imageP, dateA, qte) 
                                VALUES (:nomProduit, :categ, :descrProduit, :prixProduit, :imgProduit, :dateAProduit, :qte)";
        $db = getConnexion();
        try{
        $req=$db->prepare($sql);
                    $nomProduit = $produit->getnomProduit();
                    $categ = $produit->getCateg();
                    $descrProduit = $produit->getdescrProduit();
                    $prixProduit = $produit->getprixProduit();
                    $imgProduit = $produit->getimgProduit();
                    $dateAProduit = $produit->getdateAProduit();
                    $qte = $produit->getQte();
        $req->bindValue(':nomProduit',$nomProduit);
        $req->bindValue(':categ',$categ);
        $req->bindValue(':descrProduit',$descrProduit);
        $req->bindValue(':prixProduit',$prixProduit);
        $req->bindValue(':imgProduit',$imgProduit);
        $req->bindValue(':dateAProduit',$dateAProduit);
        $req->bindValue(':qte',$qte);
            $req->execute();
            //echo('tguedeli');
        }
        catch(Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }
        }

        public function updateProduit($produit, $id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE produit SET nomP = :nomProduit, categorie = :categ, descriptionP = :descrProduit, prixP = :prixProduit, imageP= :imgProduit, dateA = :dateAProduit, qte = :qte  WHERE idP= :id'
                );
                $query->execute([
                    'nomProduit' => $produit->getnomProduit(),
                    'categ' => $produit->getCateg(),
                    'descrProduit' => $produit->getdescrProduit(),
                    'prixProduit' => $produit->getprixProduit(),
                    'imgProduit' => $produit->getimgProduit(),
                    'dateAProduit' => $produit->getdateAProduit(),
                    'qte' => $produit->getQte(),
                    'id' => $id
                ]);
                echo $query->rowCount() . " records UPDATED successfully";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
 public function getProduitById($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM produit WHERE idP = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        function afficher()
    {
        $db=getConnexion();
        $sql="select * from produit";
        try
        {
            $liste=$db->query($sql);
            return $liste;
        }
        catch(Exception $e)
        {
            die ('erreur : '.$e->getMessage());

        }

}

}
?>