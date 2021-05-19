<?php 
require_once '../controller/reclamationR.php';
session_start();

$recC = new reclamationR();
    if (!(isset($_GET['idRec']))) {
       
        header('Location:specificrec.php');
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
        $reclamation = new reclamation( $_SESSION['a'],$result["sujet"], $_POST['message'], $_POST['file']);
        
        $reclamationR->addRec($reclamation);

        header('Location:affichreclamation.php');
    }
?>
 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
   
    <title>ADMIN || DASHBOARD </title>
    
<link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
   
<link  rel="stylesheet" href="../models/css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="../models/css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="../models/css/main.css">
 <link  rel="stylesheet" href="../models/css/font.css">
 <script src="../models/js/jquery.js" type="text/javascript"></script>

  <script src="../models/js/bootstrap.min.js"  type="text/javascript"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="../assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="../assets/js/init/fullcalendar-init.js"></script>
</head>

<body>
<aside id="left-panel" class="left-panel">
       <?php include_once 'nav-bar.php'; ?>
    </aside>
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
         <div class="content">



<form class="form-horizontal"  method="POST">
<fieldset>


<!-- email input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="idRec"></label>  
  <div class="col-md-6">
   <h1><strong align="center"><?php  echo 'Reponse pour la reclamation n: ', $result["idRec"]  ?></strong></h1>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label" for="idadmin"></label>
  <div class="col-md-6">
    <h3 align="center"><?php  echo 'Admin ID : ', $_SESSION['a']  ?></h3>
    
  </div>
</div>
<div class="form-group">

  <label class="col-md-3 control-label" for="sujet"></label>
  <div class="col-md-6">
       <h3 >Sujet: </h3>
    <textarea rows="2" cols="50" disabled="disabled" >
  <?php  echo  $result["sujet"]  ?>
        </textarea>
  </div>
</div>
<div class="form-group">

  <label class="col-md-3 control-label" for="CON"></label>
  <div class="col-md-6">
       <h3 >vous allez repondre a cette reclamation :</h3>
    <textarea rows="8" cols="80" disabled="disabled" >
  <?php  echo  $result["message"]  ?>
        </textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label" for="message"></label>
  <div class="col-md-6">
    <h3 >Contenu : </h3>
    <textarea rows="8" cols="80" name="message">
    </textarea>
  </div>



<div class="form-group">
  <label class="col-md-4 control-label" for="file"></label>
  <div class="col-md-4">
    <input type="file" name="file">
    
  </div>
</div>
      </div>
      <div class="modal-footer">
      
<a href="affichreclamation.php"><input type="button" value="annuler"  ></a>
<input  type="submit"  value="envoyer" />

    </fieldset>
</form>

</div>
</div>
</body>
</html>