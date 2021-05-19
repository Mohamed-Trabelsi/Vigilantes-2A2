<?php
    require_once '../controller/compteU.php';
    require_once '../assets/compte.php';
session_start();

    $compteU =  new compteU();

     if (isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['occupation']) && isset($_POST['password'])) {
        $compte = new compte($_POST['email'], $_POST['name'], $_POST['lastname'], $_POST['occupation'], $_POST['gender'], $_POST['password']);
        
        $compteU->updateUser($compte ,$_GET['idUser']);
$result = $compteU->getUserById($_GET['idUser']);
        $_SESSION['e'] = $result['email'];;
        
         $_SESSION['b'] =$result['name'];;
    }
?>

<!DOCTYPE html>

<html lang="en">

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
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Compte <i
                                class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">Compte</h1>
            </div>
        </div>
    </div>
</section>
    <?php
        if (isset($_GET['idUser'])) {
            $result = $compteU->getUserById($_GET['idUser']);
            if ($result !== false) {
    ?>
    <section class="container">
         <center>
                <div class="row justify-content-center pb-5 mb-3">
                    <div class="col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated">
                        <h2>Update compte</h2>
                    </div>

                </div>
            </center>
        


        <div class="form-container">
           


            <div class="col-md-12">
            <div class="contact-wrap w-100 p-md-5 p-4">
                
                <form method="POST" id="theForm" name="theForm"  class="contactForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label class="label" for="email">Email</label>
                            <input type="text"  class="form-control" name = "email" value = "<?= $result['email'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="name">NAME</label>
                                <input type="text"  class="form-control" name = "name" value = "<?= $result['name'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="lastname">lastname</label>
                                <input type="text"  class="form-control" name = "lastname" value = "<?= $result['lastname'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="gender">gender</label>
                                <input type="text"  class="form-control" name = "gender" value = "<?= $result['gender'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="occupation">occupation</label>
                                <input type="text"  class="form-control" name = "occupation" value = "<?= $result['occupation'] ?>">
                            </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label" for="password">password</label>
                                <input type="password"  class="form-control" name = "password" value = "<?= $result['password'] ?>">
                            </div>
                        </div>
                       
                        
          
                        <div class="col-md-12" >
                         <input  type="submit"   value="modifier" name = "submit" class="btn btn-primary"
                                       style="float: left; height: 55px; padding: 0px 0px;">  
                                                                        
                        </div>

                    </div>
        </div>
    </section>

    <?php
        }
    }
        else {
            header('Location:affichage.php');
        }
    
    ?>
    
<?php include_once 'footer.php'; ?>
</body>

</html>