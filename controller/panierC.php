

<?php 

include_once "../config.php";
/**
 * 
 */
class panierC
{


 function ajouterpanier($panier)
  {


  $sql="INSERT INTO panier(idP,prixP,qnt) VALUES(:idP,:prixP,:qnt)";
  $db = config::getConnexion();
   require 'C:\wamp64\www\projetweb\view/PHPMailer-master/PHPMailerAutoload.php';
    try{

        $req=$db->prepare($sql);    
        $idP=$panier->GetidP();
        $prixP=$panier->GetprixP();
        $qnt=$panier->Getqnt();
        

    $req->bindValue(':idP',$idP);
    $req->bindValue(':prixP',$prixP);
     $req->bindValue(':qnt',$qnt);
     
//var_dump($mail);

            if ($req->execute())
            {
              echo "Produit Ajouté au panier";
            }
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
  }



  function afficherpanier()
    {

        $db = config::getConnexion();
            $sql=" SELECT *FROM panier";

        try{
        $req=$db->prepare($sql);
        $req->execute();
        $panier= $req->fetchALL(PDO::FETCH_OBJ);
        return $panier;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }

function modifierpanier($panier,$idP){
        $sql="UPDATE panier SET  idP=:idP , prixP=:prixP, qnt=:qnt   WHERE idP=$idP";
        $db = config::getConnexion();

        try{
        $req=$db->prepare($sql);
        $idP=$panier->GetidP();
        $prixP=$panier->GetprixP();
         $qnt=$panier->Getqnt();
        
       
       
       

       $req->bindValue(':idP',$idP);
        $req->bindValue(':prixP',$prixP);
       
   $req->bindValue(':qnt',$qnt);
                
            $req->execute();

       
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        //   header("Location:C:/wamp64/www/projetweb/view/front/shop-detail.php");
           exit();
          
        }

function supprimerpanier($idP){
        $sql="DELETE  from panier where idP=$idP";
        $db = config::getConnexion();
        /*config a = new config();
        a->getConnexion();*/
        try{
        $req=$db->prepare($sql);
        $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
     function panier_details($idP){

        $sql="SELECT *  FROM panier where idP = $idP";
        $db = config::getConnexion();
        try{
        $lpanier=$db->query($sql);
        return $lpanier;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
}


?>