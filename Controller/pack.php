<?php 
	require_once("../config.php");
	class gererPack
	{		
          public function ajouterPack($pack) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO pack (nompk, img, description, prix, quantite, dateD, dateF, produit) 
                               VALUES (:nomPk, :imgPk, :descrPk, :prixPk, :qte, :dateD, :dateF, :prod)'
                );
                $query->execute([
                    'nomPk' => $pack->getnomPk(),
                    'imgPk' => $pack->getimgPk(),
                    'descrPk' => $pack ->getdescrPk(),
                    'prixPk' => $pack ->getprixPk(),
                    'qte' => $pack ->getQte(),
                    'dateD' => $pack ->getdateD(),
                    'dateF' => $pack ->getdateF(),
                    'prod' => $pack ->getprod(),
                ]);
                
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function afficherPack() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM pack'

                );
                
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function deletePack($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM pack WHERE idPk= :id'
                );
                $query->execute([
                    'id' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }


        public function updatePack($pack, $id) {
            try {

                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE pack SET nompk = :nomPk, img = :imgPk, description = :descrPk, prix = :prixPk, quantite = :qte, dateD = :dateD, dateF = :dateF WHERE idPk = :id'

                );

                $query->execute([
                    'nomPk' => $pack->getnomPk(),
                    'imgPk' => $pack->getimgPk(),
                    'descrPk' => $pack ->getdescrPk(),
                    'prixPk' => $pack ->getprixPk(),
                    'qte' => $pack ->getQte(),
                    'dateD' => $pack ->getdateD(),
                    'dateF' => $pack ->getdateF(),
                    
                    'id' => $id
                ]);
                echo $query->rowCount() . " records UPDATED successfully";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

         public function getPackById($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM pack WHERE idPk = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
    }