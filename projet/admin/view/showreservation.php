<?php
    require_once '../controller/reservationR.php';
session_start();
    $reservationR =  new reservationR();

	$reservations = $reservationR->afficherReservation();
if (isset($_POST['Filter']))
	{ if($_POST['Filter']=="dateR")
		{$reservations = $reservationR->filtre_DateR();}
		elseif ($_POST['Filter']=="check_in") {
		 $reservations = $reservationR->filtreCheck_in();}
		 elseif ($_POST['Filter']=="check_out") {
		 $reservations = $reservationR->filtreCheck_out();}
		 elseif ($_POST['Filter']=="paiement") {
		 $reservations = $reservationR->filtrePaiement();
		 } 
	
	 }
	if (isset($_GET['id'])) {
		$reservationR->deleteReservation($_GET['id']);
		header('Location:showreservation.php');
	}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	
	  <title>reservation </title>
    

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
	<li> <span id="missnom"></span><br></li>    
<?php include_once 'nav-bar.php'; ?>
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






	
	   <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <br>
 
<section class="container">
	 <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                             
                                
                                <table>
                                  <form action="" method = "POST">
                                            <tr>
                                                <td>
                                                    <select class="custom-select browser-default" name="Filter">
                                                  <option selected value="dateR">date reservation</option>
                                                  <option value="check_in">check_in</option>
                                                  <option value="check_out">check_out</option>
                                                  <option value="paiement">paiement</option>
                            </select> 
                                                </td>
                                                <td><button class="btn btn-block btn-primary">trier</button>
                                                </td>
                                                <td> <a type="button" class="btn btn-primary shop-item-button" href = "pdf_reservation.php">pdf</a>
                                                </td>
                                                        
                            
                                  
                                            </tr>
                                  
                                  </form>
                              </table>
                             
                            
                            
                            <div class="input-group" style="margin-top: 1.5%;">

                                <br>
                                <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                <input onkeyup="filterSearch()" placeholder="Chercher des clients ou des hotels ..."  class="form-control" type="text" id="searchInput" >
                            </div>
                        </div>
                        <br>
                        <div class="table-stats order-table ov-h">
                            <table class="table " id="myTable">
                                <thead>
                                <tr>
                                    <th>date de reservation</th>
                                    <th>check in</th>
                                    <th>check out</th>
                                    <th>paiement</th>
                                    <th>id hotel</th>
                                    <th>id client</th>
                                    <th>Gérer</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($reservations as $reservation) {  ?>
                                <tr>
                                    <td class="serial"><?php echo $reservation['dateR']; ?></td>
                                  
                                    <td> <?php echo $reservation['check_in'];  ?> </td>
                                    <td>  <span class="name"><?php echo $reservation['check_out'];  ?></span> </td>
                                    <td> <span class="name"><?php echo $reservation['paiement'];  ?>TND</span> </td>
                                    <td><span class="name"><?php echo $reservation['hotel'];  ?></span></td>
                                    <td>
                                        <span class="name"><?php echo $reservation['client'];  ?></span>
                                    </td>

                                    
                                   <td >   
						<a  href = "updatereservation.php?id=<?= $reservation['num'] ?>">
									<button  type="button" class="btn btn-outline-success"> <i class="fa fa-edit"></i></button>

                                            </a>
			<a href="showreservation.php?id=<?= $reservation['num'] ?>">
		<button type="button" class="btn btn-outline-danger"> <i class="fa fa-trash-o"></i></button></a>
	</td>
                                </tr>
                                <?php

                                }
                                ?>
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                             
</body>
                    </div>
                </div>

            </div>
<script type="text/javascript">
	function filterSearch() {
            var input, filter, table, tr, td,td2, i, txtValue,txtValue2;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[5];
                td2 = tr[i].getElementsByTagName("td")[4];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    if ( (txtValue.toUpperCase().indexOf(filter) > -1) || (txtValue2.toUpperCase().indexOf(filter) > -1)  ) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
</script>
</section>

</body>

</html>