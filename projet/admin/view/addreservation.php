<?php
    require_once '../controller/reservationR.php';
    require_once '../models/reservation.php';
    require_once '../controller/hotelC.php';
session_start();
if(empty($_SESSION['e']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: view.php');
   }
$test=5;
$reserv = 0;
   $reservationR =  new reservationR();
    $hotelC =  new hotelC();
     if (isset($_GET['id'])) {
            $result = $hotelC->getAlbumById($_GET['id']);}

    if (isset($_POST['date']) && isset($_POST['check_in']) && isset($_POST['check_out'])) {
           $test= 1;
            $calc_days = abs(strtotime( $_POST['check_out']) - strtotime($_POST['check_in'])) ; 
            $calc_days =floor($calc_days / (60*60*24)  );
          $p= $result['prix'] *  $calc_days ;
          $check_in = $_POST['check_in'];
          $check_out= $_POST['check_out'];
           $date= $_POST['date'];}

            
if (isset($_POST['test3']) && isset($_POST['date1'])  ) {
   
  
    $reservation = new reservation($_POST['date1'], $_POST['check_in1'], $_POST['check_out1'], $_POST['paiement1'],$_GET['id'], $_SESSION['a']);

       
        $reservationR->addReservation($reservation);
      
        $reserv=1;
       ?> <?php
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
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
                <li class="nav-item active"><a href="listehotel.php" class="nav-link">Logement</a></li>
               <li class="nav-item "><a href="listeAnimaux.php" class="nav-link">Adoption</a></li>
                <li class="nav-item"><a href="EngagementsSociaux.php" class="nav-link">Engagements Sociaux</a></li>
                <li class="nav-item"><a href="afficompte.php" class="nav-link">Votre Compte</a></li>
                
               

            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_5.jpg');"
         data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Accueil<i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Adoption <i
                            class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">Logement</h1>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section bg-light">
    <div class="container">
       
        <center><div class="row justify-content-center pb-5 mb-3">
                <div class="col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated">
                    <h2>Nouvelle réservation</h2>
                </div>
    
    








 <div class="content">
        <!-- Animated -->

        <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                
                <?php  if ($reserv==1) { ?>
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">✓</span>
                        Réservation effectuée avec succès
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
               
                <?php } ?>
            </div>
        </div>





















    <?php if ($test != 1 ) { ?>
       
    
    
    
    <section class="container">
       
        <div class="col-md-12">
            <div class="contact-wrap w-100 p-md-5 p-4">
        
            <form action="" method = "POST"  class="contactForm">
                <div class="form-group">
                <div class="row">
                    <div class="col-25">                
                        <label class="label">date: </label>
                    </div>
                    <div class="col-75">
                        <input type="date" name = "date" class="form-control" required>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label class="label" >check_in</label>
                    </div>
                    <div class="col-75">
                        <input type="date" name = "check_in" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                   
                    
                    
                   
                    <div class="col-25">
                        <label class="label">check_out</label>
                    </div>
                    <div class="col-75">
                        <input type = "date" name = "check_out"  class="form-control"required >
                    </div>
                </div>
                <br>
                <div class="row">
                    <input type="submit" value="suivant" name = "submit" required class="btn btn-primary"
                                       style="float: left; height: 55px; padding: 0px 0px;">
                </div>
            </form>
        </div>
        </div>

    </section>

    <?php 
} 
     ?>







     <?php if ($test == 1 ) { ?>
       
    
   
    
    <section class="container">
        
       
        <div class="col-md-12">
            <div class="contact-wrap w-100 p-md-5 p-4">
                <form action="" method = "POST" class="contactForm">
               <div class="row">
                    <div class="col-25">                
                        <label class="label">date: </label>
                    </div>
                    <div class="col-75">
                        <input type="date" name = "date1" value="<?=$date?>" class="form-control" readonly required autofocus>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label class="label">check_in</label>
                    </div>
                    <div class="col-75">
                        <input type="date" name = "check_in1" value="<?=$check_in?>" class="form-control"  readonly required autofocus>
                    </div>
                </div>
                 <div class="col-25">
                        
                        <label class="label">check_out</label>
                    </div>
                    <div class="col-75">
                        <input type = "date" name = "check_out1" value="<?=$check_out?>"class="form-control"  readonly required autofocus>
                    </div>
                <div class="row">
                    <div class="col-25">
                      <br>
                        <label class="label">paiement(TND): </label>
                    </div>
                    <div class="col-75">
                        <input type="real" name = "paiement1" value="<?= $p?> " class="form-control" readonly required autofocus>


                    </div>
                    <div class="col-25">
                    
                        <label class="label">clients: <?=$_SESSION['b'] ?></label>
                    </div>
                   
                    <div class="col-25">
                        <label name= "hotel" class="label" >hotel: <?= $result['name']?></label>
                    </div>
                   
                   
                </div>
                <br>
                <div class="row">
                    <input type="submit" value="Réserver" name = "test3" class="btn btn-primary"
                                       style="float: left; height: 55px; padding: 0px 0px;">
                </div>
            </form>
        </div>
        </div>
    </section>
   
    <?php 
} 
     ?>
   </div>
</div>
</div>
</center>
</div>
</section>
<?php include_once 'footer.php'; ?>
</body>


</body>

</html>