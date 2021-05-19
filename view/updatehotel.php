<?php
    require_once '../controller/hotelC.php';
    require_once '../assets/hotel.php';
session_start();

    $hotelC =  new hotelC();

    if (isset($_POST['name']) && isset($_POST['prix']) && isset($_POST['image'])  && isset($_POST['adresse'])  && isset($_POST['caracteristiques'])  && isset($_POST['chambre'])) {
        $hotel = new hotel($_POST['name'], (float)$_POST['prix'], $_POST['image'], $_POST['adresse'],$_POST['caracteristiques'], $_POST['chambre']);
        
        $hotelC->updateHotel($hotel,$_GET['id']);
    }
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<meta charset="UTF-8">
    
      <title>hotels </title>
    

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
   

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
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="profiladmin.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">UI elements</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Boutique</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="tables-basic.html">Basic Table</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">Data Table</a></li>
                            

                          
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>users</a>
                        <ul class="sub-menu children dropdown-menu">                            <li><i class="fa fa-puzzle-piece"></i><a href="affichreclamation.php">les reclamations</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="affichage.php">les comptes</a></li>
                        
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>farah</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Basic Form</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
                        </ul>
                    </li>

                    <li class="menu-title">Icons</li><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>oussama</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Font Awesome</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Themefy Icons</a></li>
                        </ul>
                    </li>
                   
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>mahdi</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-line-chart"></i><a href="charts-chartjs.html">Chart JS</a></li>
                            <li><i class="menu-icon fa fa-area-chart"></i><a href="charts-flot.html">Flot Chart</a></li>
                            <li><i class="menu-icon fa fa-pie-chart"></i><a href="charts-peity.html">Peity Chart</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>gestion du logement</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-map-o"></i><a href="showhotel.php">gestion des hotels</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="showreservation.php">gestion des reservations </a></li>
                        </ul>
                    </li>
                    <li class="menu-title">log out</li><!-- /.menu-title -->
                 
                        
                            
<li><a href="deconnexion.php"> <i class="menu-icon fa fa-sign-in"></i>Déconnecter </a></li>
                        
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
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
















    <?php
        if (isset($_GET['id'])) {
            $result = $hotelC->getAlbumById($_GET['id']);
			if ($result !== false) {
    ?>
	<section class="container">
		
		<div class="form-container">
            <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Modification de L'Hotel</h5>
        <div class="form-container">
            <form action="" method = "POST" class="form-signin">
                <div class="row">
                    <div class="col-25">                
                        <label>Title: <span style="color: #FF0000">*</span> </label>
                    </div>
                    <div class="col-75">
                        <input type="text" name = "name" value = "<?= $result['name'] ?>" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Prix <span style="color: #FF0000">*</span></label>
                    </div>
                    <div class="col-75">
                        <input type="number" name = "prix" value = "<?= $result['prix'] ?>" class="form-control" required>
                    </div>
                    <div class="row">
                    <div class="col-25">
                        <label>adresse <span style="color: #FF0000">*</span></label>
                    </div>
                    <div class="col-75">
                        <input type="adresse" name = "adresse" value = "<?= $result['adresse'] ?>" class="form-control" required>
                    </div>
                    <div class="row">
                    <div class="col-25">
                        <label>chambre dispo <span style="color: #FF0000">*</span></label>
                    </div>
                    <div class="col-75">
                        <input type="number" name = "chambre" value = "<?= $result['chambre'] ?>" class="form-control" required>
                    </div>
                    <div class="row">
                    <div class="col-25">
                        <label>caracteristiques <span style="color: #FF0000">*</span></label>
                    </div>
                    <div class="col-75">
                        <input type="text" name = "caracteristiques" value = "<?= $result['caracteristiques'] ?>" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Image <span style="color: #FF0000">*</span></label>
                    </div>
                    <div class="col-75">
                        <input type = "file" name = "image" value = "<?= $result['image'] ?>" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <input type="submit" value="Submit" name = "submit" class="btn btn-lg btn-primary btn-block text-uppercase">
                </div>
            </form>
		</div>
        </div>
        </div>
        </div>
        </div>
        </div>
	</section>

    <?php
        }
    }
        else {
            header('Location:showhotel.php');
        }
    
    ?>
	
</body>

</html>