<?php
    require_once '../config.php';
    class EvenementC {
        public function afficherEvenement() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM evenements'
                );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getEvenementById($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM evenements WHERE id = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

public function getEvenementById_Group($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT id_group FROM evenements WHERE id = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getEvenementByNom($nom) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM evenements WHERE nom = :nom'
                );
                $query->execute([
                    'nom' => $nom
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function addEvenement($evenement) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO evenements (id,nom, adresse, dateD, dateF, nb_participant, image, id_group) 
                VALUES (:id, :nom, :adresse, :dateD, :dateF, :nb_participant, :image, :id_group)'
                );
                $query->execute([
                    'id'=> uniqid(),
                    'nom' => $evenement->getNom(),
                    'adresse' => $evenement->getAdresse(),
                    'dateD' => $evenement->getDateD(),
                    'dateF' => $evenement->getDateF(),
                    'nb_participant' => $evenement->getNb_participant(),
                    'image' => $evenement->getImage(),
                    'id_group' => $evenement->getId_group(),
                    

                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function updateEvenement($evenement, $id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE evenements SET nom = :nom, adresse = :adresse, dateD = :dateD, dateF = :dateF, nb_participant = :nb_participant, image = :image, id_group = :id_group WHERE id = :id'
                );
                $query->execute([
                    'nom' => $evenement->getNom(),
                    'adresse' => $evenement->getAdresse(),
                    'dateD' => $evenement->getDateD(),
                    'dateF' => $evenement->getDateF(),
                    'nb_participant' => $evenement->getNb_participant(),
                    'image' => $evenement->getImage(),
                    'id_group' => $evenement->getId_group(),
                  'id' => $id
                ]);
                echo $query->rowCount() . "Row UPDATED successfully";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function deleteEvenement($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM evenements WHERE id = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function rechercherEvenement($nom) {            
            $sql = "SELECT * from evenements where nom=:nom"; 
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    'nom' => $evenement->getNom(),
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