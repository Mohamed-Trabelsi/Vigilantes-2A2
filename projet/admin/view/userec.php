<?php 
require_once '../controller/reclamationR.php';
session_start();

$recC = new reclamationR();
    if (!(isset($_GET['idRec']))) {
       
        header('Location:reclamationuser.php');
    }
    $result=$recC->getRecByidRec($_GET['idRec']);
     
 ?>
<!DOCTYPE html>
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
               <li class="nav-item "><a href="listeAnimaux.php" class="nav-link">Adoption</a></li>
                <li class="nav-item"><a href="EngagementsSociaux.php" class="nav-link">Engagements Sociaux</a></li>
                <li class="nav-item active"><a href="afficompte.php" class="nav-link">Votre Compte</a></li>
                
               

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

                
                
            
        </div>
        <center><div class="row justify-content-center pb-5 mb-3">
                <div class="col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated">
                    
                </div>

            </div></center>
        <div class="col-md-12">
            <div class="contact-wrap w-100 p-md-5 p-4">
                <h3 align="center"><strong ><?php  echo 'Reclamation n: ', $result["idRec"]  ?></strong></h3>
                <h4 align="center"><?php  echo 'User ID : ', $result["iduser"]  ?></h4>
                <br>
                <form method="POST" id="theForm" name="theForm"  class="contactForm">
                    <div class="row">
                        <div class="col-md-6">
                       
                            <div class="form-group">
                                <label class="label" for="sujet">sujet</label>
                                <textarea  class="form-control"rows="2" cols="50" disabled="disabled" ><?php  echo  $result["sujet"]  ?>
                              </textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label" for="message">message</label>
                                <textarea class="form-control" disabled="disabled" > <?php  echo  $result["message"]  ?> </textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            <label class="label" for="file">Photo</label>
                            <br>
                            <img src="../photo/<?= $result["file"] ?>" width = "200" height = "200" class="shop-item-image">
                            </div>
                        </div>
                        </div>

                    </div>
                </form>
                <div class="modal-footer">

        <a type="submit" class="btn btn-primary" href = "repondreuser.php?idRec=<?= $result["idRec"] ?>">repondre</a>
      
       <a href="reclamationuser.php" class="btn btn-primary" > fermer</a>
</div>
            </div>
        </div>
    </div>
</section>





</div>

</body>
</html>