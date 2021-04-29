<?PHP
include_once("../config.php");
class produitC {
   
	
	function ajouterProduit($produit){
		$sql="insert into produit (idprod,nomprod,description,prixkg,disponibilite,qtedispo,lienimage,idcat) values (:idprod, :nomprod, :description, :prixkg, :disponibilite, :qtedispo, :lienimage, :idcat)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $idprod=$produit->getIdprod();
        $nomprod=$produit->getNomprod();
        $description=$produit->getDescription();
        $prixkg=$produit->getPrixkg();
        $disponibilite=$produit->getDisponibilite();
        $qtedispo=$produit->getQtedispo();
        $lienimage=$produit->getLienimage();
        $idcat=$produit->getIdcat();
		$req->bindValue(':idprod',$idprod);        
		$req->bindValue(':nomprod',$nomprod);
		$req->bindValue(':description',$description);
		$req->bindValue(':prixkg',$prixkg);
		$req->bindValue(':disponibilite',$disponibilite);
        $req->bindValue(':qtedispo',$qtedispo);
        $req->bindValue(':lienimage',$lienimage);
		$req->bindValue(':idcat',$idcat);

		
            $req->execute();
           
        }
        catch (Exception $e){
            die ('Erreur: '.$e->getMessage());
        }		
	}

	function afficher()
	{
		$db=config::getConnexion();
		$sql="select * from produit";
		try
		{
			$liste=$db->query($sql);
			return $liste;

		}
		catch(Exception $e){
			die ('erreur : '.$e->getMessage());

		}
	}	

	function supprimer($idprod)
	{
		$sql="delete from produit where idprod= :idprod";
		$db=config::getConnexion();			
		$req=$db->prepare($sql);
		$req->bindValue(':idprod',$idprod);
		try
		{
			$req->execute();
		}
		catch (Exception $e)
		{
			die('Erreur:'.$e->getMessage());
		}

	}
	function recupererProduit($idprod){
		$sql="SELECT * from produit where idprod='$idprod'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}	
    function modifierProduit($produit,$idprod){
		$sql="UPDATE produit SET idprod=:idprod, nomprod=:nomprod,description=:description,prixkg=:prixkg,disponibilite=:disponibilite,qtedispo=:qtedispo,idcat=:idcat WHERE idprod=:idprod";
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $nomprod=$produit->getNomprod();
        $description=$produit->getDescription();
        $prixkg=$produit->getPrixkg();
        $disponibilite=$produit->getDisponibilite();
        $qtedispo=$produit->getQtedispo();
        $lienimage=$produit->getLienimage();        
        $idcat=$produit->getIdcat();
        $idprodd=$produit->getIdprod();
		$req->bindValue(':idprod',$idprod);
		$req->bindValue(':nomprod',$nomprod);
		$req->bindValue(':description',$description);
		$req->bindValue(':prixkg',$prixkg);
		$req->bindValue(':disponibilite',$disponibilite);
		$req->bindValue(':qtedispo',$qtedispo);
		$req->bindValue(':idcat',$idcat);
		$req->bindValue(':idprodd',$idprodd);
            $s=$req->execute();
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
	}
function afficher_filtre($idcat)
	{
		$db=config::getConnexion();
		$sql="select * from produit where idcat='$idcat'";
		try
		{
			$liste=$db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die ('erreur : '.$e->getMessage());
		}
	}
		function afficher2($nomprod)
	{
		$db=config::getConnexion();
		$sql="SELECT * from produit where nomprod='$nomprod'";
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