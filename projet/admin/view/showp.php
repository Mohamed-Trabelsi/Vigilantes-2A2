<?php
    require_once '../controller/produit.php';
    require_once '../controller/pack.php';

    $produitG =  new gererProduit();

	$produits = $produitG->afficherProduit();
    $packG =  new gererPack();
    $packs = $packG->afficherPack();
	session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['e']))
{
    $_SESSION['b'] = "guest";
    // Si inexistante ou nulle, on redirige vers le formulaire de login

   }

	
?>

	 
<!DOCTYPE html>
<html lang="en">
<head>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v10.0" nonce="lzRpfdmx"></script>

    <title>Pet Sitting - Free Bootstrap 4 Template by Colorlib</title>
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
                <li class="nav-item active"><a href="showp.php" class="nav-link">Notre Boutique</a></li>
                <li class="nav-item"><a href="listehotel.php" class="nav-link">Logement</a></li>
                <li class="nav-item "><a href="listeAnimaux.php" class="nav-link">Adoption</a></li>
                <li class="nav-item"><a href="EngagementsSociaux.php" class="nav-link">Engagements Sociaux</a></li>
                <li class="nav-item"><a href="afficompte.php" class="nav-link">Votre Compte</a></li>
                
          
                  <a href="cart_items.php"> <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                  <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                 </svg>
                 
                           </a>
                 </div>

            </ul>
        </div>

</nav>
<!-- END nav -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');"
         data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Accueil<i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Adoption <i
                            class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">Adoption</h1>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section bg-light">
    <div class="container">
        <div class="row mb-5 pb-5">

            
        </div>

<center><div class="row justify-content-center pb-5 mb-3">
                <div class="col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated">
                    <h2>Liste des Produits</h2>
                </div>

            </div></center>
        <div class="row">
            <?php foreach ($produits as $produit) { ?>
            <div class="col-md-6 col-lg-4 ftco-animate fadeInUp ftco-animated">
                <div class="staff">
                    <div class="img-wrap d-flex align-items-stretch">
                        <div class="img align-self-stretch" style="background-image: url(../photo/<?php echo $produit['imageP']; ?>)"></div>
                    </div>
                    <div class="text pt-3 px-3 pb-4 text-center">
                        <h3><?php echo $produit['nomP']; ?></h3>
                        <span class="position mb-2"><?php echo $produit['prixP']; ?> TND </span>
                        <div class="faded">
                            <p><?php echo $produit['descriptionP']; ?></p>
                            <div class="fb-share-button" data-href="http://showp.php" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2FlisteP.php%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Partager</a></div>
                        </div>
                        <br><br>
                        <a class="btn btn-success" href="add_panier.php?id_produit=<?php echo $produit["idP"]; ?>&&prix_total=<?php echo $produit["prixP"]; ?>" >Ajouter au panier</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row mb-5 pb-5">

            
        </div>

<center><div class="row justify-content-center pb-5 mb-3">
                <div class="col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated">
                    <h2>Liste des Packs</h2>
                </div>

            </div></center>
        <div class="row">
            <?php foreach ($packs as $pack) { ?>
            <div class="col-md-6 col-lg-4 ftco-animate fadeInUp ftco-animated">
                <div class="staff">
                    <div class="img-wrap d-flex align-items-stretch">
                        <div class="img align-self-stretch" style="background-image: url(../photo/<?php echo $pack['img']; ?>)"></div>
                    </div>
                    <div class="text pt-3 px-3 pb-4 text-center">
                        <h3><?php echo $pack['nompk']; ?></h3>
                        <span class="position mb-2"><?php echo $pack['prix']; ?> TND </span>
                        <div class="faded">
                            <p><?php echo $pack['description']; ?></p>
                            <p>Date début: <?php echo $pack['dateD']; ?></p>
                            <p>Date fin: <?php echo $pack['dateF']; ?></p>
                            <div class="fb-share-button" data-href="http://showp.php" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2FlisteP.php%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Partager</a></div>
                        </div>
                        <br><br>
                        <a class="btn btn-success" href="add_panier.php?id_produit=<?php echo $produit["idP"]; ?>&&prix_total=<?php echo $produit["prixP"]; ?>" >Ajouter au panier</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</section>
</body>
<br><br>

<?php include_once 'footer.php'; ?>
</html>