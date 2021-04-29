<?PHP
include "../controller/commandeC.php";
include "../controller/panierC.php";
include  "../controller/produitC.php";
include "../controller/categorieC.php";




session_start();
$panier1C=new panierC();
$listePanier=$panier1C->afficherPanier($_SESSION['id']);
$c = new categorieC();
$liste=$c->afficher();

//var_dump($listePanier->fetchAll());
?>

<!DOCTYPE html>
<html>
<head>
	<title>Acceuil</title>
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
  <a class="navbar-brand" href="#">Utique Fruit</a>
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
<table class="table">
<tr>
<td>id_produit</td>
<td>quantite</td>
<td>prix_total</td>
</tr>

<p> Les produits à commander </p>
<?PHP
$prix_commande=0;
foreach($listePanier as $row){
	?>
	<tr>
	<td><?PHP echo $row['id_produit']; ?></td>
	<td><?PHP echo $row['quantite']; ?></td>
	<td><?PHP echo $row['prix_total']; ?></td>
	</tr>
	<?PHP
	$prix_commande = $prix_commande+ $row['prix_total'];

}
?>
</table>
<?php 
echo "Prix total de la commande est : ";
  echo $prix_commande; 
?>
 <form method="GET" action="ajoutCommande.php">
  <br/> 
   <p> Veuillez choisir le mode de payement <br/> 
<input type="radio" name="mode_de_payement"  value="par carte"> payement par carte <br/>
<input type="radio" name="mode_de_payement"  value="à la livraison" > payement à la livraison <br/>
<input type="hidden" value="<?PHP echo $row['id_client']; ?>" name="id_client">
<input type="hidden" value="<?PHP echo $prix_commande ?>" name="prix_total">
<input type="submit" value="valider la commande">
   </p>
</form>
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
