<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php include_once '../../entities/compte.php';
$conn = config::getConnexion();
$user=new compte($_POST['id'],$_POST['motdepasse']);
$user->setconn($conn);
$liste=$user->Logedin($conn,$_POST['id'],$_POST['motdepasse']);
//verification id/mot de passe
$vide=false;
if(!empty($_POST['id'])&&!empty($_POST['motdepasse'])){
	foreach ($liste as $champs_de_compte) {
		$vide=true;
		if($champs_de_compte['id']==$_POST['id'] && $champs_de_compte['motdepasse']==$_POST['motdepasse']){
			session_start();
			$_SESSION['id']=$_POST['id'];
			$_SESSION['motdepasse']=$_POST['motdepasse'];
			$_SESSION['type']=$champs_de_compte['type'];//admin ou client 
			if($_SESSION['type']=='admin'){
						header("location:../../views/admin-dashboard/afficherProduit.php");//page num 1 coté admin*/ 

			}else{
				//type client 
				header("location:../../views/client/accueil.php");
			}

		}


	}
	if($vide==false){
		//id ou mot de passe incorrect
		echo '<script>
        alert("id ou mot de passe incorrect");
  window.location.assign("login.php")
		</script>';
	}

}else {
	 echo '<script>alert("Les variables du formulaire ne sont pas déclarées.Vous devez remplir le formulaire");
  window.location.assign("login.php");

	 </script>'; 
}
?>
</body>
</html>