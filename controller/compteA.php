<?php 

require_once '../config.php';
    class compteA {
        public function afficheradmin() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM admin'
                );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getadminById($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM admin WHERE idAdmin = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function getadminByEmail($email) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM admin WHERE email = :email'
                );
                $query->execute([
                    'email' => $email
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function getadminByGender($gender) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM admin WHERE gender = :gender'
                );
                $query->execute([
                    'gender' => $gender
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getadminByLastname($lastname) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM admin WHERE lastname = :lastname'
                );
                $query->execute([
                    'lastname' => $lastname
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function getadminByName($name) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM admin WHERE name = :name'
                );
                $query->execute([
                    'name' => $name
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function addadmin($cadmin) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO admin (email, name, lastname, gender, password) 
                VALUES (:email, :name, :lastname, :gender, :password)'
                );
                $query->execute([
                    'email' => $cadmin->getemail(),
                    'name' => $cadmin->getname(),
                    'lastname' => $cadmin->getlastname(),
                    
                    'gender' => $cadmin->getgender(),
                    'password' => $cadmin->getpassword()
                    
                    
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function updateUser($cadmin, $id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE user SET email = :email, name = :name, lastname = :lastname, gender = :gender , password = :password, WHERE idAdmin = :id'
                );
                $query->execute([
                    'email' => $cadmin->getemail(),
                    'name' => $cadmin->getname(),
                    'lastname' => $cadmin->getlastname(),
                    
                    'gender' => $cadmin->getgender(),
                    'password' => $cadmin->getpassword(),
                    'id' => $id
                ]);
                echo $query->rowCount() . " records UPDATED successfully";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function deleteadmin($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM admin WHERE idAdmin = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function rechercheradmin($name) {            
            $sql = "SELECT * from admin where name=:name"; 
            $db = getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    'name' => $cadmin->getname(),
                ]); 
                $result = $query->fetchAll(); 
                return $result;
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
        }
        function connexionAdmin($email,$password){
            $sql="SELECT * FROM admin WHERE email='" . $email . "' and password = '". $password."'";
            $db = getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
                $count=$query->rowCount();
                if($count==0) {
                    $message = "pseudo ou le mot de passe est incorrect";
                } else {
                    $x=$query->fetch();
                    $message = $x['role'];
                }
            }
            catch (Exception $e){
                    $message= " ".$e->getMessage();
            }
          return $message;
        }
    }

 ?>