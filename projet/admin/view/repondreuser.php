<?php 
require_once '../controller/reclamationR.php';
session_start();

$recC = new reclamationR();
    if (!(isset($_GET['idRec']))) {
       
        header('Location:userec.php');
    }
    $result=$recC->getRecByidRec($_GET['idRec']);
     
 ?>
 <?php
    require_once '../controller/reclamationR.php';
    require_once '../assets/reclamation.php';

    $reclamationR =  new reclamationR();
    $recC = new reclamationR();
$result=$recC->getRecByidRec($_GET['idRec']);
    if (isset($_POST['message']) && isset($_POST['file'])) {
        $reclamation = new reclamation($_SESSION['a'],$result["sujet"], $_POST['message'], $_POST['file']);
        
        $reclamationR->addRec($reclamation);

        header('Location:reclamationuser.php');
    }
?>
 <!DOCTYPE html>

<head>
    <html xmlns="http://www.w3.org/1999/xhtml">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
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
                    <h2>Reponse aux reclamations</h2>
                </div>

            </div></center>
        <div class="col-md-12">
            <div class="contact-wrap w-100 p-md-5 p-4">
                
                <form method="POST" id="theForm" name="theForm"  class="contactForm">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                   <label class="col-md-3 control-label" for="idRec"></label>  
                   <h3  align="left"class="mb-4" ><?php  echo 'Reponse pour la reclamation n° ', $result["idRec"] ?></h3>                     
          <div class="col-md-6">
             <div class="form-group">
                 <label class="label" for="iduser"></label>
                     <h4 align="left" class="mb-4"><?php  echo 'User ID : ',$_SESSION['a'] ?></h4>
                     
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label" for="sujet">vous allez répondre a ce message </label>
                                <textarea class="form-control" disabled="disabled" > <?php  echo  $result["message"]  ?> </textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label" for="message">Contenu</label>
                                <textarea required name="message" class="form-control" id="message" rows="5"
                                          placeholder="message ..."></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="file">Photo</label>
                                <input required type="file" accept="image/png, image/jpeg" class="form-control" name="file"
                                       id="photo">
                            </div>
                        </div>
                        
          
                        <div class="col-md-12" >
                        <input  type="submit"  value="envoyer" class="btn btn-primary"
                                       style="float: left; height: 55px; padding: 0px 0px;"/>
                        </div>
                       
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


</div>
</body>
</html>