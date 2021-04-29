<?PHP
include_once "../entities/mailing.php"; 
include "../entities/reclamation.php";
include "../controller/reclamationC.php";

    if(isset($_GET['id_reclamation'])){
        $reclamationC=new reclamationC();
        $result=$reclamationC->recupererreclamation($_GET['id_reclamation']);
      

        foreach($result as $row){
            $id_reclamation=$row['id_reclamation'];
            $id_client=$row['id_client'];
            $type=$row['type'];
            $date=$row['date'];
            $avis=$row['avis'];
            $id_commmande=$row['id_commande'];
            $email=$row['email'];
            

      



        }}
        $result=$reclamationC->recupererreclamation2($_GET['id_reclamation']);
if($type=="temps")
  { 
       $m=new mailing($email,$type,"desolé pour le retard");
   $m->envoyer();	}
   if($type=="prix")
   {  $m=new mailing($email,$type,"allah ghaleb ma3ana manaamloulek ");
    $m->envoyer();	}

        $reclamationC->modifier($reclamation,$id_reclamation);


        header("Location: afficherreclamation.php");

/*
if (isset($_POST['email']) and isset($_POST['type']) and isset($_POST['message'])) {
    $mail=new Mailing($_POST['email'],$_POST['type'],$_POST['message']);
    $m=new mailing($_POST['email'],$_POST['type'],$_POST['message']);
    $m->envoyer();	
   // header("location:afficherreclamation.php?id_reclamation=".$_POST['id_reclamation']);

}else{
	echo "vérifier les champs";}*/

?>


