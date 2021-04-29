<?PHP
include_once("../config.php");
class categorieC {
    function afficherCategorie ($categorie){
		echo "Idcat: ".$categorie->getIdcat()."<br>";
		echo "Nom: ".$categorie->getNom()."<br>";
		echo "Saison: ".$categorie->getSaison()."<br>";
		echo "Infos generales: ".$categorie->getInfosgenerales()."<br>";
	}
	
	function ajouterCategorie($categorie){
		$sql="insert into categorie (idcat,nom,saison,infosgenerales) values (:idcat, :nom,:saison,:infosgenerales)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $idcat=$categorie->getIdcat();
        $nom=$categorie->getNom();
        $saison=$categorie->getSaison();
        $infosgenerales=$categorie->getInfosgenerales();
		$req->bindValue(':idcat',$idcat);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':saison',$saison);
		$req->bindValue(':infosgenerales',$infosgenerales);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }		
	}

	function afficher()
	{
		$db=config::getConnexion();
		$sql="select * from categorie";
		try
		{
			$liste=$db->query($sql);
			return $liste;

		}
		catch(Exception $e){
			die ('erreur : '.$e->getMessage());

		}
	}	

	function supprimer($idcat)
	{
		$sql="delete from categorie where idcat= :idcat";
		$db=config::getConnexion();			
		$req=$db->prepare($sql);
		$req->bindValue(':idcat',$idcat);
		try
		{
			$req->execute();
		}
		catch (Exception $e)
		{
			die('Erreur:'.$e->getMessage());
		}

	}
	function recupererCategorie($idcat){
		$sql="SELECT * from categorie where idcat='$idcat'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}	
    function modifierCategorie($categorie,$idcat){
		$sql="UPDATE categorie SET idcat=:idcate, nom=:nom,saison=:saison,infosgenerales=:infosgenerales WHERE idcat=:idcat";
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $nom=$categorie->getNom();
        $saison=$categorie->getSaison();
        $infosgenerales=$categorie->getInfosgenerales();
        $idcate=$categorie->getIdcat();
		$req->bindValue(':idcat',$idcat);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':saison',$saison);
		$req->bindValue(':infosgenerales',$infosgenerales);
		$req->bindValue(':idcate',$idcate);
            $s=$req->execute();
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
	}
	function afficher2($nom)
	{
		$db=config::getConnexion();
		$sql="SELECT * from categorie where nom='$nom'";
		$db = config::getConnexion();	
		try
		{
			$liste=$db->query($sql);
			return $liste;

		}
		catch(Exception $e){
			die ('erreur : '.$e->getMessage());

		}
	}	
	
}

?>