<?php
/**
 * 
 */
class Gestion_compte
{
	function ajouterCompte($compte){
		$sql="insert into compte values (:id,:motdepasse,:adresse_email,:type)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $id=$compte->getId();
        $motdepasse=$compte->getmotdepasse();
        $type=$compte->gettype();
        $adresse_email=$compte->getAdresse_email();
		$req->bindValue(':id',$id);
		$req->bindValue(':motdepasse',$motdepasse);
		$req->bindValue(':type',$type);		
		$req->bindValue(':adresse_email',$adresse_email);
		                $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: ajouter compte'.$e->getMessage();
        }
	}
	function recupererCompte($id){
		$sql="select * from compte where id='$id'";
        $db=config::getConnexion();
             try
        {
            $liste=$db->query($sql);
            return $liste;

        }
        catch(Exception $e){
            die ('erreur recupererCompte : '.$e->getMessage());

        }
	}

}
?>