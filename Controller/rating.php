<?php 
	require_once("../config.php");
	class ratingC
	{		
          public function rate($note,$id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                      'UPDATE produit SET note = :note WHERE idC = :id'
                );
                $query->execute([
                    'note' => $note->getNote(),
                    'id' => $note->getid()
                ]);
                
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }


        public function getProduitById1($id) {
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
    }
