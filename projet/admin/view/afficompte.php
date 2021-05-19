
<?php
    require_once '../controller/compteU.php';
session_start();
if(empty($_SESSION['e']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: view.php');
   }
    $compteU =  new compteU();
    $compte = $compteU->getUserByEmail($_SESSION['e']);

    if (isset($_GET['idUser'])) {
        $compteU->deleteUser($_GET['idUser']);
        header('Location:view.php');
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
                                    class="ion-ios-arrow-forward"></i></a></span> <span>votre profil<i
                                class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">votre profil</h1>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row mb-5 pb-5">

             <div class="col-md-6 d-flex align-self-stretch px-4 ftco-animate fadeInUp ftco-animated">
                <div class="d-block services text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-pawprint"></span>
                    </div>
                    <div class="media-body p-4">
                        <a href="reclamationuser.php"> <h3 class="heading" >Reclamations</h3></a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 d-flex align-self-stretch px-4 ftco-animate fadeInUp ftco-animated">
                <div class="d-block services text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-pawprint"></span>
                    </div>
                    <div class="media-body p-4">
                        <a href="deconnexion.php"> <h3 class="heading">déconnecter</h3></a>
                    </div>
                </div>
            </div>

        </div>
</div>
        </section>
        



<section class="container">
    <div class="container">
       
        <center>
            <div class="row justify-content-center pb-5 mb-3">
                <div class="col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated">
                    <h2>Votre Compte</h2>

               </div>
                
<div class="col-md-12">
            <div class="contact-wrap w-100 p-md-5 p-4">
 

 <form class="contactForm">
    <div class="panel"><div class="table-responsive">

        <table >
<tr>
    <td><b class="label">id User</b></td>
    <td width=33% ><strong class="form-control"><?= $compte['idUser'] ?></strong></td>

</tr>
<tr>
    <td><b class="label">email</b></td>
   <td width=33%>  <strong class="form-control"><?= $compte['email'] ?></strong></td>
   
</tr>
<tr>
    <td><b class="label">name</b></td>
   <td width=33%><strong class="form-control"><?= $compte['name'] ?></strong></td>
 </tr>
<tr>
   
<td><b class="label">lastname</b></td>
<td width=33%><strong class="form-control"><?= $compte['lastname'] ?></strong></td>
  </tr>
     <tr>
<td><b class="label">occupation</b></td>

<td width=33%><strong class="form-control"><?= $compte['occupation'] ?></strong></td>
 
  </tr>
     <tr>
         <td><b class="label">gender</b></td>
<td width=33%><strong class="form-control"><?= $compte['gender'] ?></strong></td>
 
<br>
      
        </table></div></div>
  <div>

 <tr ><td><a  type="button" class="btn btn-primary"  href = "updatecompte.php?idUser=<?= $compte['idUser'] ?>">modifier mon compte</a></td></tr> 
 <tr><td> <a type="button"  class="btn btn-primary" href = "afficompte.php?idUser=<?= $compte['idUser'] ?>">supprimer mon compte</a></td></tr> 
 
 </div> 
</form>
</div> 
</div> 
</div> 

</center>
</div> 
 </section>



<?php include_once 'footer.php'; ?>
</body>

</html>
