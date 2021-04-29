
<?php 

include_once "../config.php";
/**
 * 
 */
class commandeC
{ 	
	function ajouterCommande($commande){
		$sql="insert into commande (id_commande,id_utilisateur,prix_total,mode_de_payement) values (:id_commande,:id_utilisateur,:prix_total,:mode_de_payement)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $id_commande=$commande->get_id_commande();
        $id_utilisateur=$commande->get_id_utilisateur();
        $prix_total=$commande->get_prix_total();
        $mode_de_payement=$commande->get_mode_de_payement();
		$req->bindValue(':id_commande',$id_commande);
		$req->bindValue(':id_utilisateur',$id_utilisateur);
		$req->bindValue(':prix_total',$prix_total);
		$req->bindValue(':mode_de_payement',$mode_de_payement);
		
            $req->execute();
           
        }
        catch (Exception $e){
            die('Erreur: ajouterCommande'.$e->getMessage()) ;
        }
		
	}

	function afficherCommandeAdmin(){
		$sql="SElECT * From commande";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: afficherCommande'.$e->getMessage());
        }	
	}

	function afficherCommande($id_utilisateur){
		$sql="SElECT * From commande where id_utilisateur='$id_utilisateur'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: afficherCommande'.$e->getMessage());
        }	
	}

    function afficherCommandee($id_utilisateur,$id_commande){
		$sql="SElECT * From commande where (id_utilisateur='$id_utilisateur' and id_commande='$id_commande')";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: afficherCommande'.$e->getMessage());
        }	
	}

	function supprimerCommande($id_commande){
		$sql="DELETE FROM commande where id_commande= :id_commande ";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_commande',$id_commande);
		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: supprimerCommande '.$e->getMessage());
        }
	}

	function recupererCommande($id_commande){
		$sql="SELECT * from commande where id_commande=$id_commande";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: recupererCommande '.$e->getMessage());
        }
	}

	function rechercherCommande($valuesearch,$champs,$tri)
	{ if($tri=='croissant')
	     {
      switch ($champs) {
		case 'id_commande':
			$sql="SELECT * from commande where id_commande like '%$valuesearch%' order by id_commande ASC";
		    $db = config::getConnexion();
			break;
		case 'id_utilisateur':
			$sql="SELECT * from commande where id_utilisateur like '%$valuesearch%' order by id_utilisateur ASC ";
		    $db = config::getConnexion();
			break;
	    case 'prix_total':
			$sql="SELECT * from commande where prix_total like '%$valuesearch%' order by prix_total ASC";
		    $db = config::getConnexion();
			break;
		case 'mode_de_payement':
			$sql="SELECT * from commande where mode_de_payement like '%$valuesearch%' order by mode_de_payement ASC";
		    $db = config::getConnexion();
			break;
		
	         }
	       }
	}
	
} 

	
	

?>