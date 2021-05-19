

<?php

    require_once '../controller/GroupC.php';
    require_once '../models/group.php';


    $GroupC =  new GroupC();
session_start();
if(empty($_SESSION['e']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: view.php');
   }

  if (isset($_POST['nom']) && isset($_POST['num']) && isset($_POST['contact']) && isset($_POST['image']) && isset($_POST['description']) ) {
        $group = new group($_POST['nom'], $_POST['num'], $_POST['contact'], $_POST['image'], $_POST['description']);
        
        $GroupC->updateGroup($group,$_GET['id']);
        header('Location:listegroups.php');
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
               <li class="nav-item"><a href="listeAnimaux.php" class="nav-link">Adoption</a></li>
                <li class="nav-item active"><a href="EngagementsSociaux.php" class="nav-link">Engagements Sociaux</a></li>
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
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Engagement Sociaux <i
                                class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">Engagement Sociaux</h1>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section bg-light">
    <div class="container">
          <div class="row mb-5 pb-5">

             <div class="col-md-6 d-flex align-self-stretch px-4 ftco-animate fadeInUp ftco-animated">
                <div class="d-block services text-center" >
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-pawprint"></span>
                    </div>
                    <div class="media-body p-4">
                        <a href="listegroups.php"> <h3 class="heading" >Liste des groups volontaires</h3></a>
                    </div>
                </div>
             </div>

            <div class="col-md-6 d-flex align-self-stretch px-4 ftco-animate fadeInUp ftco-animated">
                <div class="d-block services text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-pawprint"></span>
                    </div>
                    <div class="media-body p-4">
                        <a href="listeevenements.php"> <h3 class="heading">Liste des evenements</h3></a>
                    </div>
                </div>
            </div>
        
        </div>
        <center><div class="row justify-content-center pb-5 mb-3">
                <div class="col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated">
                    <h2>Formulaire de modification</h2>
                </div>

            </div></center>
            <?php
        if (isset($_GET['id'])) {
            $result = $GroupC->getGroupById($_GET['id']);

            if ($result !== false) {
    ?>
        <div class="col-md-12">
            <div class="contact-wrap w-100 p-md-5 p-4">
                <h3 class="mb-4">Remplissez les champs</h3>
                <form method="POST" id="theForm" name="theForm"  class="contactForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="nom">Nom</label>
                                <input required  type="text" class="form-control" name="nom" id="nom" placeholder="Nom" value = "<?= $result['nom'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="num">num</label>
                                <input required type="text" class="form-control" name="num" id="num" placeholder="Numero telephone" value = "<?= $result['num'] ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="contact">email</label>
                                <input required type="text" class="form-control" name="contact" id="contact" placeholder="example@xyz.com" value = "<?= $result['contact'] ?>">
                            </div>
                        </div>
                      

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="image">Photo</label>
                                <input required type="file" accept="image/png, image/jpeg" class="form-control" name="image" value = "<?= $result['image'] ?>"
                                       id="image">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label" for="description">Description</label>
                                <textarea required name="description" class="form-control" id="description" rows="5"
                                          placeholder="Description de votre group ..." value = "<?= $result['description'] ?>"></textarea>
                            </div>
                        </div>
          <!--***************ena badalt type submit b onclick="Envoyer() **********-->
                        <div class="col-md-12" >
                         <input onclick="EnvoyerG()"  value="Modifier" class="btn btn-primary"
                                       style="float: left; height: 55px; padding: 0px 0px;">
                        </div>

                    </div>
                </form>
            </div>
        </div>
            <?php
        }
    }
     
    
    ?>
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

<script src="controlesaisieG.js"></script>

</body>
</html>