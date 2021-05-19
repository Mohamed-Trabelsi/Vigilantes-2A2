<?php
    require_once '../controller/compteU.php';
 
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['e']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: view.php');
   }
?>
<?php

require("../controller/DataBaseModel.php");
require_once("../models/Animal.php");
require_once("../models/Refuge.php");
require_once("../controller/AnimalController.php");
require_once("../controller/RefugeController.php");
require_once("../controller/reservationR.php");
$animalController = new AnimalController();
$reservationR =  new reservationR();
$statRefuge  = $animalController->getStatisticRefuge() ;
$statRace =$animalController->getStatisticRace() ;
$statReservation = $reservationR->getStatisticHotel();

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>mew Admin</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
</head>

<body>

 <?php include_once 'nav-bar.php'; ?>
<!-- Right Panel -->
<!-- /#left-panel -->
<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
      
         <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="profiladmin.php"><img src="../assets/img/logo.png" alt="Logo" height="42" width="42"></a>
                    <a class="navbar-brand hidden" href="./"><img src="../assets/img/logo.png" alt="Logo" height="42" width="42">></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
 <div class="top-right">
            <div class="header-menu">
                <div class="header-left">
                    <?php
                    // Il est bien connecté
                    echo 'Bienvenue admin ', $_SESSION['b'];
                    ?>
 
                </div>
            </div>

   </div>
    </header>
    <!-- /#header -->
    <!-- Breadcrumbs-->
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Statistiques</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                    <button type="button" onclick="window.print()" onclick="sortTableUp()" class="btn btn-outline-primary"> <i class="fa  fa-print"></i> Imprimer PDF </button></a>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.breadcrumbs-->
    <!-- Content -->
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Animaux par refuge</h4>
                            <canvas id="pieChart"></canvas>
                        </div>
                    </div>
                </div><!-- /# column -->


                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Nombre d'animaux des races </h4>
                            <canvas id="singelBarChart"></canvas>
                        </div>
                    </div>
                </div><!-- /# column -->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Réservations par hotel</h4>
                            <canvas id="pieChart2"></canvas>
                        </div>
                    </div>
                </div><!-- /# column -->


            </div>

        </div><!-- .animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
    <!-- Footer -->
    <footer class="site-footer">
        <div class="footer-inner bg-white">
            <div class="row">
                <div class="col-sm-6">
                    Copyright &copy; 2018 Ela Admin
                </div>
                <div class="col-sm-6 text-right">
                    Designed by <a href="https://colorlib.com">Colorlib</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- /.site-footer -->
</div>
<!-- /#right-panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="../assets/js/main.js"></script>
<!--  Chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>
<script>( function ( $ ) {
        "use strict";



        //pie chart
        var ctx = document.getElementById( "pieChart" );
        ctx.height = 300;
        var myChart = new Chart( ctx, {
            type: 'pie',
            data: {
                datasets: [ {
                    data: [  <?php foreach ($statRefuge as $s) {  echo  $s['nbr']  . ',';   }?> ],
                    backgroundColor: [
                        "rgba(0, 194, 146,0.9)",
                        "rgba(0, 194, 146,0.7)",
                        "rgba(0, 194, 146,0.5)",
                        "rgba(0,0,0,0.07)"
                    ],
                    hoverBackgroundColor: [
                        "rgba(0, 194, 146,0.9)",
                        "rgba(0, 194, 146,0.7)",
                        "rgba(0, 194, 146,0.5)",
                        "rgba(0,0,0,0.07)"
                    ]

                } ],
                labels: [
                    <?php foreach ($statRefuge as $s) {  echo '"'. $s['nom'] . '",';   }?>
                ]
            },
            options: {
                responsive: true
            }
        } );



         //pie chart2
        var ctx = document.getElementById( "pieChart2" );
        ctx.height = 300;
        var myChart = new Chart( ctx, {
            type: 'pie',
            data: {
                datasets: [ {
                    data: [  <?php foreach ($statReservation as $s) {  echo  $s['nbr']  . ',';   }?> ],
                    backgroundColor: [
                        "rgba(0, 194, 146,0.9)",
                        "rgba(0, 194, 146,0.7)",
                        "rgba(0, 194, 146,0.5)",
                        "rgba(0,0,0,0.07)"
                    ],
                    hoverBackgroundColor: [
                        "rgba(0, 194, 146,0.9)",
                        "rgba(0, 194, 146,0.7)",
                        "rgba(0, 194, 146,0.5)",
                        "rgba(0,0,0,0.07)"
                    ]

                } ],
                labels: [
                    <?php foreach ($statReservation as $s) {  echo '"'. $s['name'] . '",';   }?>
                ]
            },
            options: {
                responsive: true
            }
        } );






        // single bar chart
        var ctx = document.getElementById( "singelBarChart" );
        ctx.height = 150;
        var myChart = new Chart( ctx, {
            type: 'bar',
            data: {
                labels: [  <?php foreach ($statRace as $s) {  echo '"'. $s['nom'] . '",';   }?> ],
                datasets: [
                    {
                        label: "Nombre d'anmaux",
                        data: [  <?php foreach ($statRace as $s) {  echo  $s['nbr']  . ',';   }?>],
                        borderColor: "rgba(0, 194, 146, 0.9)",
                        borderWidth: "0",
                        backgroundColor: "rgba(0, 194, 146, 0.5)"
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [ {
                        ticks: {
                            beginAtZero: true
                        }
                    } ]
                }
            }
        } );




    } )( jQuery );
</script>
<!--Flot Chart-->
<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

</body>
</html>
