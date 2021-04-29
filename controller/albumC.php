<?php
    require_once '../config.php';
    class albumC {
        public function afficherHotel() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM hotels'
                );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getAlbumById($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM hotels WHERE id= :id'
                );
                $query->execute([
                    'id' => $id
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getHotelByName($name) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM hotels WHERE name = :name'
                );
                $query->execute([
                    'name' => $name
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function addHotel($hotel) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO hotels (name, prix, image,adresse,caracteristiques,chambre) 
                VALUES (:name, :prix, :image, :adresse, :caracteristiques, :chambre)'
                );
                $query->execute([
                    'name' => $hotel->getName(),
                    'prix' => $hotel->getPrix(),
                    'image' => $hotel->getImage(),
                    'adresse'=>$hotel->getAdresse(),
                    'caracteristiques'=>$hotel->getCaracteristiques(),
                    'chambre'=>$hotel->getChambre() 
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function updateHotel($hotel, $id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE hotels SET name = :name, adresse = :adresse, caracteristiques = :caracteristiques, chambre = :chambre, prix = :prix, image = :image WHERE id = :id'
                );
                $query->execute([
                    'name' => $hotel->getName(),
                    'prix' => $hotel->getPrix(),
                    'image' => $hotel->getImage(),
                    'adresse'=>$hotel->getAdresse(),
                    'caracteristiques'=>$hotel->getCaracteristiques(),
                    'chambre'=>$hotel->getChambre(), 
                    'id' => $id
                ]);
                echo $query->rowCount() . " records UPDATED successfully";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function deleteHotel($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM hotels WHERE id = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function rechercherAlbum($title) {            
            $sql = "SELECT * from album where name=:title"; 
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    'name' => $album->getName(),
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