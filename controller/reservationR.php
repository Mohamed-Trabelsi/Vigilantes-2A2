<?php
    require_once '../config.php';
    class reservationR {
        public function afficherReservation() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM reservations'
                );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
 public function filtre_DateR() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM reservations ORDER BY dateR '
                );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function filtreCheck_in() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM reservations ORDER BY check_in'
                );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function filtreCheck_out() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM reservations ORDER BY check_out'
                );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function filtrePaiement() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM reservations ORDER BY paiement'
                );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
 
        public function getReservationBynum($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM reservations WHERE num= :id'
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

        public function addReservation($reservation) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO reservations (dateR,check_in,check_out,paiement,hotel,client) 
                VALUES (:dateR, :check_in, :check_out, :paiement, :hotel, :client)'
                );
                $query->execute([
                    'dateR' => $reservation->getDate(),
                    'check_in' => $reservation->getCheck_in(),
                    'check_out' => $reservation->getCheck_out(),
                    'paiement'=>$reservation->getPaiement(),
                    'hotel'=>$reservation->getHotel(),
                    'client'=>$reservation->getClient() 
                ]);

            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function updateReservation($reservation, $id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE reservations SET dateR = :dateR, check_in = :check_in, check_out = :check_out, paiement = :paiement, hotel = :hotel, client = :client WHERE num = :id'
                );
                $query->execute([
                   'dateR' => $reservation->getDate(),
                    'check_in' => $reservation->getCheck_in(),
                    'check_out' => $reservation->getCheck_out(),
                    'paiement'=>$reservation->getPaiement(),
                    'hotel'=>$reservation->getHotel(),
                    'client'=>$reservation->getClient(), 
                    'id' => $id
                ]);
                echo $query->rowCount() . " records UPDATED successfully";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function deleteReservation($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM reservations WHERE num = :id'
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