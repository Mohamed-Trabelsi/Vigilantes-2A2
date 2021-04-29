<?php
    require_once '../config.php';
    class produitC {
        public function afficherproduit() {
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

        public function getproduitById($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM produit WHERE idproduit = :idP'
                );
                $query->execute([
                    'idP' => $id
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getproduitBynomP($nomP) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM produit WHERE nomP = :nomP'
                );
                $query->execute([
                    'nomP' => $nomP
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function addproduit($produit) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO produit (nomP, prix, image) 
                VALUES (:nomP, :prix, :image)'
                );
                $query->execute([
                    'nomP' => $produit->getnomP(),
                    'prix' => $produit->getPrix(),
                    'image' => $produit->getImage()
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function updateproduit($produit, $id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE produit SET nomP = :nomP, prix = :prix, image = :image WHERE idproduit = :idP'
                );
                $query->execute([
                    'nomP' => $produit->getnomP(),
                    'prix' => $produit->getPrix(),
                    'image' => $produit->getImage(),
                    'idP' => $id
                ]);
                echo $query->rowCount() . " PRODUIT UPDATED successfully";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function deleteproduit($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM produit WHERE idproduit = :idP'
                );
                $query->execute([
                    'idP' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function rechercherproduit($nomP) {            
            $sql = "SELECT * from produit where nomP=:nomP"; 
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    'nomP' => $produit->getnomP(),
                ]); 
                $result = $query->fetchAll(); 
                return $result;
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
        }
        
    }
    ?>