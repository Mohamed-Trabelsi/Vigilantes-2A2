<?php
    require_once dirname(__DIR__).'../config.php';
    class GroupC {
        public function afficherGroup() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM groups'
                );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getGroupById($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM groups WHERE id = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getGroupByNom($nom) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM groups WHERE nom = :nom'
                );
                $query->execute([
                    'nom' => $nom
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function addGroup($group) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO groups (id,nom, num, contact, image, description) 
                VALUES (:id, :nom, :num, :contact, :image, :description)'
                );
                $query->execute([
                    'id'=> uniqid(),
                    'nom' => $group->getNom(),
                    'num' => $group->getNum(),
                    'contact' => $group->getContact(),
                    'image' => $group->getImage(),
                    'description' => $group->getDescription(),
               

                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function updateGroup($group, $id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE groups SET nom = :nom, num = :num, contact = :contact, image = :image, description = :description WHERE id = :id'
                );
                $query->execute([
                    'nom' => $group->getNom(),
                    'num' => $group->getNum(),
                    'contact' => $group->getContact(),
                    'image' => $group->getImage(),
                    'description' => $group->getDescription(),
                  'id' => $id
                ]);
                echo $query->rowCount() . "Row UPDATED successfully";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function deleteGroup($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM groups WHERE id = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function rechercherGroup($nom) {            
            $sql = "SELECT * from groups where nom=:nom"; 
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    'nom' => $group->getNom(),
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