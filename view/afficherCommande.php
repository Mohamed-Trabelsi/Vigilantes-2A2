<?PHP
include "../controller/commandeC.php";

session_start();
$commande1C=new commandeC();
$listeCommande=$commande1C->afficherCommande($_SESSION['id']);
$c = new categorieC();
$liste=$c->afficher();

//var_dump($listePanier->fetchAll());
?>
<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="dashboard.css">
	<title>Mes Commandes</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="produit.css">

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="jquery-3.4.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/872f60d218.js" crossorigin="anonymous"></script>

<script type="text/javascript" src="main.js"></script>

</head>

<body>
<div class="header" id="myHeader">
<nav class="navbar navbar-expand-lg custom-nav">
  <img src="../logo.jpg" class="logo">
  <a class="navbar-brand" href="#">MEW</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link"href="accueil.php">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Specifications techniques 
</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Catégorie
        </a>
        <!-- bloc menu déroulant -->
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="afficherproduit.php">Tous les Catégories</a>
          <?php foreach ($liste as $row) {
           ?>
          <a class="dropdown-item" href="afficherproduit.php?idcat=<?php echo $row['idcat']?>"><?php echo $row['nom'];?></a>
       <?php  } ?>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contactes</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="forum.php">Forum</a>
      </li>
    </ul>
    <?php if(isset($_SESSION['id']) && isset($_SESSION['motdepasse'])) {?>
        <ul class="navbar-nav ml-auto nav-flex-icons">
       <li class="nav-item dropdown" style="color: white;">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-cogs"></i>

        </a>

        <div class="dropdown-menu dropdown-menu-right dropdown-default" 
          aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="afficherPanier.php?id_client=<?php echo $_SESSION['id'];?>">
          Modifier Mon panier <i class="fas fa-shopping-cart"></i></a>
          <a class="dropdown-item" href="#">Consulter Mes livraisons <i class="fas fa-truck"></i></a>
          <a class="dropdown-item" href="#">Passer une Réclamation <i class="fas fa-exclamation-triangle"></i> </a>
          <a class="dropdown-item" href="../login/logout.php">Se déconnecter
          <i class="fas fa-sign-out-alt"></i></a>
        </div>
      </li>
    </ul>
  <?php }else{
  }?>
  </div>

</nav>
</div>
<table class="table" >
<tr>
<td>id_commande</td>
<td>id_utilisteur</td>
<td>prix_total</td>
<td>mode_de_payement</td>
<td>supprimer</td>
<td>Enregistrer une facture</td>
</tr>

<?PHP
foreach($listeCommande as $row){
	?>
	<tr>
	<td><?PHP echo $row['id_commande']; ?></td>
	<td><?PHP echo $row['id_utilisateur']; ?></td>
	<td><?PHP echo $row['prix_total']; ?></td>
	<td><?PHP echo $row['mode_de_payement']; ?></td>
	<td><form method="POST" action="supprimerCommande.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id_commande']; ?>" name="id_commande">
	</form>
	</td>
	<td><form method="POST" action="genererPDF.php">
	<input type="submit" name="PDF" value="Enregistrer une facture">
	<input type="hidden" value="<?PHP echo $row['id_commande']; ?>" name="id_commande">
	</form>
	</td>
	</tr>
	<?PHP
}
?>
</table >

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
<footer>
  <table>
    <tr>
    <th colspan="2">Contact : 
    </th>
    <th id="break">Nos réseaux sociaux : 
    </th>
  </tr>
    <th>
      
    </th>
     <tr>
     <td>
      Adresse:  
     </td>  
     <td>
     NABEUL 
     </br>
     8050 NABEUL,Tunis

     </td>
     <td id="break">
       <a href="#" class="fa fa-facebook"></a>
           <a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-instagram"></a>
<a href="#" class="fa fa-google"></a>
     </td>
    
     </tr>
        <tr>
     <td>
     Téléphone:  
     </td>  
     <td>
     22626879  
     </td>
     </tr>
      <tr>
     <td>
     E-mail: 
     </td>  
     <td>
info@MEW.com.tn
     </td>
     </tr>
    </table>
      <p> Digital Natives 2021 © Tous droits réservés</p>


      </footer> 
<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>

</body>
</html>