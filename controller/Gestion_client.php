<?php
include_once("../config.php");
include_once("../entities/compte.php");
include_once("../controller/Gestion_compte.php");

/**
 * 
 */
class Gestion_client extends Gestion_compte
{
	function ajouterClient($Client,$compte){
        $compte->settype('client');
        parent::ajouterCompte($compte);
		$sql_client="insert into client values (:id,:pays,:ville,:code_postal)";
		$db = config::getConnexion();
		try{
        $req_client=$db->prepare($sql_client);
        $id=$compte->getId();
        $pays=$Client->getPays();
        $ville=$Client->getVille();
        $code_postal=$Client->getCode_postal();
		$req_client->bindValue(':id',$id);
		$req_client->bindValue(':pays',$pays);
		$req_client->bindValue(':ville',$ville);
		$req_client->bindValue(':code_postal',$code_postal);
		
            $req_client->execute();

           
        }
        catch (Exception $e){
            die('Erreur:  ajouterclient'.$e->getMessage());
        }
}
}
?>