<?php
//require_once("../admin/controller/DataBaseModel.php");
//require_once("../admin/controller/AnimalController.php");
require_once("../controller/DataBaseModel.php");
require_once("../controller/AnimalController.php");
$animalController = new AnimalController();
$animaux = $animalController->afficherAnimal();
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
                <li class="nav-item"><a href="showp.php" class="nav-link">Notre Boutique</a></li>
                <li class="nav-item"><a href="listehotel.php" class="nav-link">Logement</a></li>
               <li class="nav-item active"><a href="listeAnimaux.php" class="nav-link">Adoption</a></li>
                <li class="nav-item"><a href="EngagementsSociaux.php" class="nav-link">Engagements Sociaux</a></li>
                <li class="nav-item"><a href="afficompte.php" class="nav-link">Votre Compte</a></li>
                
               

            </ul>
        </div>
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

            <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate fadeInUp ftco-animated">

                <div class="d-block services text-center" >
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-blind"></span>
                    </div>
                    <div class="media-body p-4">
                        <a href="ajouterAnimal.php"> <h3 class="heading" >Ajouter un animal</h3>    </a>

                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate fadeInUp ftco-animated">
                <div class="d-block services text-center" style="background-color: #00bd56;">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-blind"></span>
                    </div>
                    <div class="media-body p-4">
                        <a href="listeAnimaux.php">  <h3 class="heading" style="color : white;">Liste des animaux</h3></a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate fadeInUp ftco-animated">
                <div class="d-block services text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-blind"></span>
                    </div>
                    <div class="media-body p-4">
                        <a href="listeRefuges.php"> <h3 class="heading">Liste des refuges</h3></a>
                    </div>
                </div>
            </div>
        </div>
        <center><div class="row justify-content-center pb-5 mb-3">
                <div class="col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated">
                    <h2>Liste des animaux</h2>
                </div>

            </div></center>
        <div class="row">
            <?php foreach ($animaux as $a) { ?>
            <div class="col-md-6 col-lg-4 ftco-animate fadeInUp ftco-animated">
                <div class="staff">
                    <div class="img-wrap d-flex align-items-stretch">
                        <div class="img align-self-stretch" style="background-image: url(../photo/<?php echo $a['photo']; ?>)"></div>
                    </div>
                    <div class="text pt-3 px-3 pb-4 text-center">
                        <h3><?php echo $a['nom']; ?></h3>
                        <span class="position mb-2"><?php echo $a['race']; ?></span>
                        <div class="faded">
                            <p><?php echo $a['age']." - ".$a['sexe']." - ".$a['refugeNom']." - ".$a['poids']; ?></p>
                            <p><?php echo $a['description']; ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <?php } ?>

        </div>




    </div>
</section>


<?php include_once 'footer.php'; ?>


<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>


</body>
</html>