<?php


include "../controller/panierC.php";
$panierC=new panierC();
session_start();
$panier = $panierC->afficherPanier($_SESSION['a']);

if(empty($_SESSION['e']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: view.php');
   }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Project vigilantes || MEW </title>


 <link rel="stylesheet" href="../models/css/main.css">

 

  <script src="../models/js/bootstrap.min.js"  type="text/javascript"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">


    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style_adoption.css">
</head>

<body>
    <?php include_once 'tete.php'; ?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
         <a class="navbar-brand" href="profilUser.php"><img src="../assets/img/logo.png" alt="Logo" height="70" width="70"> Mew</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="profiluser.php" class="nav-link">Acceuil</a></li>
                <li class="nav-item"><a href="showp.php" class="nav-link">Notre Boutique</a></li>
                <li class="nav-item"><a href="listehotel.php" class="nav-link">logement</a></li>
                <li class="nav-item"><a href="listeAnimaux.php" class="nav-link">Adoption</a></li>
                <li class="nav-item"><a href="EngagementsSociaux.php" class="nav-link">Engagements Sociaux</a></li>
             <li class="nav-item"><a href="afficompte.php" class="nav-link">Votre Compte</a></li>
                
             
            </ul>
        </div>
    </div>
</nav>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');"
         data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Accueil<i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>votre profil<i
                                class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">votre profil</h1>
            </div>
        </div>
    </div>
</section>
<div class="container" >
    <div class="card mt-4 p-4" style="height: auto">
        <h1 style="color: #17a2b8;text-align: center"> Voici votre panier:</h1>
    <div class="mt-5">
        <?php
        foreach ($panier as $p){

            ?>
            <div class="card mb-2" style="padding: 20px 150px 20px 150px; width: 500px;  box-shadow: 10px 10px 10px 10px grey;">
                <h1 style="text-align: center"><?php echo $p['nomP']; ?></h1>

                <span style="text-align: center"> <?php echo $p['prix_total'] ?> DT</span>
                <span style="text-align: center"> <?php echo $p['quantite']; ?> dans votre panier</span>
                <div class="inline">
                <a href="add_produit.php?id_produit=<?php echo $p['id_produit']; ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                </a>
                    <?php if($p['quantite']!= 1) {

                    ?>
                    <a href="minus_produit.php?id_produit=<?php echo $p['id_produit']; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                    </svg></a>
                    <?php } ?>
                    <a href="removefrompanier.php?id_prod=<?php echo $p['id_produit']; ?>" style="width: 250px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </a>
                </div>


                </div>
            <?php
        }
        ?>
    </div>
<hr>
    <form method="post" action="passerCommande.php">
        <h6 style="color: #17a2b8;text-align: center"> CHOISIR LE MODE DE PAYMENT</h6>
<div class="form-group" style="padding:0px 90px 0px 90px;">
        <label>Mode de payement:</label>

            <select name="mode_payement" class="form-control">

            <option>CARTE BANCAIRE</option>
            <option>CARTE E_DINAR</option>
            <option>MAIN a MAIN</option>
        </select>
    <br>
    <button type="submit" class="btn btn-info">COMMANDER VOTRE PRODUIT</button>
</div>

</form>

        <button type="submit" class="btn btn-success" style="width: 200px;" onclick="location.href='showp.php'">RETOUR A LA LISTE DES PRODUITS</button>
    </div>
</div>

<?php include_once 'footer.php'; ?>
</body>
</html>