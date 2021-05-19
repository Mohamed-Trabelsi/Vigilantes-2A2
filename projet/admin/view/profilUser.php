<?php
// On prolonge la session
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
    <title>MEW</title>
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
                <li class="nav-item active"><a href="profiluser.php" class="nav-link">Acceuil</a></li>
                <li class="nav-item"><a href="showp.php" class="nav-link">Notre Boutique</a></li>
                <li class="nav-item"><a href="listehotel.php" class="nav-link">Logement</a></li>
               <li class="nav-item "><a href="listeAnimaux.php" class="nav-link">Adoption</a></li>
                <li class="nav-item"><a href="EngagementsSociaux.php" class="nav-link">Engagements Sociaux</a></li>
                <li class="nav-item"><a href="afficompte.php" class="nav-link">Votre Compte</a></li>
                
               

            </ul>
        </div>
    </div>
</nav>












<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-11 ftco-animate text-center">
            <h1 class="mb-4">Des soins de la plus haute qualité pour les animaux que vous adorerez</h1>
            <p><a href="#footer" class="btn btn-primary mr-md-4 py-3 px-4">
À propos de nous<span class="ion-ios-arrow-forward"></span></a></p>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light ftco-no-pt ftco-intro">
        <div class="container">
            <div class="row">
          <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
            <div class="d-block services  text-center">
              <div class="icon d-flex align-items-center justify-content-center">
                    <span class="flaticon-blind"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Promener les animaux</h3>
               
                <a class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
              </div>
            </div>      
          </div>
          <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
            <div class="d-block services text-center">
              <div class="icon d-flex align-items-center justify-content-center">
                    <span class="flaticon-dog-eating"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">
Garderie pour animaux </h3>
                <a class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
              </div>
            </div>    
          </div>
          <div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
            <div class="d-block services text-center">
              <div class="icon d-flex align-items-center justify-content-center">
                    <span class="flaticon-grooming"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Toilettage pour animaux</h3>
           
                <a  class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
              </div>
            </div>      
          </div>
        </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row d-flex no-gutters">
                <div class="col-md-5 d-flex">
                    <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(images/about-1.jpg);">
                    </div>
                </div>
                <div class="col-md-7 pl-md-5 py-md-5">
                    <div class="heading-section pt-md-5">
                <h2 class="mb-4">Pourquoi MEW?</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6 services-2 w-100 d-flex">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-stethoscope"></span></div>
                            <div class="text pl-3">
                                <h4>Conseils d'entretien</h4>
                                <p><br></p>
                            </div>
                        </div>
                        <div class="col-md-6 services-2 w-100 d-flex">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-customer-service"></span></div>
                            <div class="text pl-3">
                                <h4>Assistance client</h4>
                             
                            </div>
                        </div>
                        <div class="col-md-6 services-2 w-100 d-flex">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-emergency-call"></span></div>
                            <div class="text pl-3">
                                <h4>Services d'urgence</h4>
                              
                            </div>
                        </div>
                        <div class="col-md-6 services-2 w-100 d-flex">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-veterinarian"></span></div>
                            <div class="text pl-3">
                                <h4>Aide vétérinaire</h4>
                              
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </div>
    </section>

    <section class="ftco-counter" id="section-counter">
        <div class="container">
                <div class="row">
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="50">0</strong>
              </div>
              <div class="text">
                <span>Client</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="8500">0</strong>
              </div>
              <div class="text">
                <span>Professionels</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="20">0</strong>
              </div>
              <div class="text">
                <span>Produits</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <strong class="number" data-number="50">0</strong>
              </div>
              <div class="text">
                <span>Animaux</span>
              </div>
            </div>
          </div>
        </div>
        </div>
    </section>

    <section class="ftco-section bg-light ftco-faqs">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-md-last">
                    <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(images/about.jpg);">
                        <a href="https://www.youtube.com/watch?v=xV8iVjbcsAk" class="icon-video popup-youtube d-flex justify-content-center align-items-center">
                            <span class="fa fa-play"></span>
                        </a>
                    </div>
                    <div class="d-flex mt-3">
                        <div class="img img-2 mr-md-2" style="background-image:url(images/about-2.jpg);"></div>
                        <div class="img img-2 ml-md-2" style="background-image:url(images/about-3.jpg);"></div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="heading-section mb-5 mt-5 mt-lg-0">
                <h2 class="mb-3">Questions fréquemment posées</h2>
              
                    </div>
                    <div id="accordion" class="myaccordion w-100" aria-multiselectable="true">
                          <div class="card">
                            <div class="card-header p-0" id="headingOne">
                              <h2 class="mb-0">
                                <button href="#collapseOne" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                                    <p class="mb-0">comment dresser votre chien?</p>
                                  <i class="fa" aria-hidden="true"></i>
                                </button>
                              </h2>
                            </div>
                            <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne">
                              <div class="card-body py-3 px-0">
                                <ol>
                                   Pour dresser son chien et lui faire comprendre qu'il doit se coucher sur ordre, agenouillez-vous à sa droite et placez votre main gauche sur ses épaules. Placez ensuite votre main droite juste derrière ses pattes avant. Dites « couché » en appuyant doucement sur ses épaules.
                                </ol>
                              </div>
                            </div>
                          </div>

                          <div class="card">
                            <div class="card-header p-0" id="headingTwo" role="tab">
                              <h2 class="mb-0">
                                <button href="#collapseTwo" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">
                                    <p class="mb-0">Comment gérer vos animaux?</p>
                                  <i class="fa" aria-hidden="true"></i>
                                </button>
                              </h2>
                            </div>
                            <div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="card-body py-3 px-0">
                                <ol>
                                    <li> On se soucie de leur moral</li>
                                    <li>On les vermifuge</li>
                                    <li>On contrôle le carnet de santé</li>
                                    <li>On le met au régime</li>
                                    <li>On chasse les tiques et les puces</li>
                                </ol>
                              </div>
                            </div>
                          </div>

                        

                     
                        </div>
            </div>
        </div>
        </div>
    </section>

    <section class="ftco-section testimony-section" style="background-image: url('images/bg_2.jpg');">
        <div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Clients satisfaits &amp; Avis</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item">
                <div class="testimony-wrap py-4">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                  <div class="text">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                        <div class="user-img" style="background-image: url(images/person_4.jpg)"></div>
                        <div class="pl-3">
                            <p class="name">Roger Scott</p>
                            <span class="position">Marketing Manager</span>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                  <div class="text">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                        <div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
                        <div class="pl-3">
                            <p class="name">Roger Scott</p>
                            <span class="position">Marketing Manager</span>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap py-4">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                  <div class="text">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <div class="d-flex align-items-center">
                        <div class="user-img" style="background-image: url(images/staff-6.jpg)"></div>
                        <div class="pl-3">
                            <p class="name">Roger Scott</p>
                            <span class="position">Marketing Manager</span>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
        
            
            </div>
          </div>
        </div>
      </div>
    </section>

   
        
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Gallerie</h2>
          </div>
        </div>
                <div class="row">
          <div class="col-md-4 ftco-animate">
            <div class="work mb-4 img d-flex align-items-end" style="background-image: url(images/gallery-1.jpg);">
                <a href="images/gallery-1.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                            <span class="fa fa-expand"></span>
                        </a>
                <div class="desc w-100 px-4">
                  <div class="text w-100 mb-3">
                    <span>Cat</span>
                    <h2><a href="work-single.html">Persian Cat</a></h2>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="work mb-4 img d-flex align-items-end" style="background-image: url(images/gallery-2.jpg);">
                <a href="images/gallery-2.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                            <span class="fa fa-expand"></span>
                        </a>
                <div class="desc w-100 px-4">
                  <div class="text w-100 mb-3">
                    <span>Dog</span>
                    <h2><a href="work-single.html">Pomeranian</a></h2>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="work mb-4 img d-flex align-items-end" style="background-image: url(images/gallery-3.jpg);">
                <a href="images/gallery-3.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                            <span class="fa fa-expand"></span>
                        </a>
                <div class="desc w-100 px-4">
                  <div class="text w-100 mb-3">
                    <span>Cat</span>
                    <h2><a href="work-single.html">Sphynx Cat</a></h2>
                  </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 ftco-animate">
            <div class="work mb-4 img d-flex align-items-end" style="background-image: url(images/gallery-4.jpg);">
                <a href="images/gallery-4.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                            <span class="fa fa-expand"></span>
                        </a>
                <div class="desc w-100 px-4">
                  <div class="text w-100 mb-3">
                    <span>Cat</span>
                    <h2><a href="work-single.html">British Shorthair</a></h2>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="work mb-4 img d-flex align-items-end" style="background-image: url(images/gallery-5.jpg);">
                <a href="images/gallery-5.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                            <span class="fa fa-expand"></span>
                        </a>
                <div class="desc w-100 px-4">
                  <div class="text w-100 mb-3">
                    <span>Dog</span>
                    <h2><a href="work-single.html">Beagle</a></h2>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="work mb-4 img d-flex align-items-end" style="background-image: url(images/gallery-6.jpg);">
                <a href="images/gallery-6.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                            <span class="fa fa-expand"></span>
                        </a>
                <div class="desc w-100 px-4">
                  <div class="text w-100 mb-3">
                    <span>Dog</span>
                    <h2><a href="work-single.html">Pug</a></h2>
                  </div>
              </div>
            </div>
          </div>
        </div>
            </div>
        </section>

    
   
    
<?php include_once 'footer.php'; ?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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