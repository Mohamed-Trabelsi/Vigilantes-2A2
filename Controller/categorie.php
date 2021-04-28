<?php 
	require_once("../config.php");
	class gererCategorie
	{
        ////
			
          public function ajouterCategorie($categorie) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO categorie (nomC, dateC) 
                VALUES (:nomCategory, :dateAC)'
                );
                $query->execute([
                    'nomCategory' => $categorie->getnomCategory(),
                    'dateAC' => $categorie->getdateAC(),
                ]);
                
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
         public function afficherCategorie() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM categorie'

                );
                
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function updateCategorie($categorie, $id) {
            try {

                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE categorie SET nomC = :nomCategory, dateC = :dateAC WHERE idC = :id'

                );

                $query->execute([
                    'nomCategory' => $categorie->getnomCategory(),
                    'dateAC' => $categorie->getdateAC(),
                    
                    'id' => $id
                ]);
                echo $query->rowCount() . " records UPDATED successfully";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function deleteCategorie($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM categorie WHERE idC= :id'
                );
                $query->execute([
                    'id' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

    

        public function getCategorieByNom($nom) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM categorie WHERE nomC = :nom'
                );
                $query->execute([
                    'nom' => $nom
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function afficherProduit($idCategory)
        {
             try 
               {
                 $pdo = getConnexion();
                 $query = $pdo->prepare(
                    'SELECT * FROM produit where categorie = :id'
                 );
                 $query->execute([
                    'id' => $idCategory
                 ]);
                 return $query->fetch();
                }
                catch (PDOException $e)
                {
                  $e->getMessage();
                }

        }
}
?>
