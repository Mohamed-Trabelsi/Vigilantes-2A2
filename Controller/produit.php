<?php
require_once("../config.php");
class gererProduit
{
public function ajouterProduit($produit) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO produit (nomP, prixP, imageP, descriptionP, dateA) 
                VALUES (:nomProduit, :prixProduit ,:imgProduit,:descrProduit, :dateAProduit)'
                );
                $query->execute([
                    'nomProduit' => $produit->getnomProduit(),
                    'prixProduit' => $produit->getprixProduit(),
                    'imgProduit' => $produit->getimgProduit(),
                    'descrProduit' => $produit->getdescrProduit(),
                    'dateAProduit' => $produit->getdateAProduit(),
                    
                    
                ]);
                
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
}
?>