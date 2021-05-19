<?php
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
require_once ("../controller/DataBaseModel.php");
require_once("../models/Refuge.php");
require_once("../controller/RefugeController.php");

$ajout = 0;
$modif = 0;
$supp = 0;

$refugeController = new RefugeController();

if(isset($_GET['deleteThisId'])) {
    if(!empty($_GET['deleteThisId'])){
        $refugeController->supprimerRefuge($_GET['deleteThisId']);
        $supp = 1;
    }
}

if( isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['capacite']) && isset($_POST['nbr_benevoles']) && isset($_POST['adresse']) && isset($_POST['photo']) ) {
    if( !empty($_POST['id']) && !empty($_POST['nom']) && !empty($_POST['capacite']) && !empty($_POST['nbr_benevoles']) && !empty($_POST['adresse'])  ) {

        $refuge = new Refuge($_POST['nom'],$_POST['capacite'],$_POST['nbr_benevoles'],$_POST['adresse'],$_POST['photo']);
        $refuge->setId($_POST['id']);
        if ( $refuge->getId() == -1) {
            $refugeController->ajouterRefuge($refuge);
            $ajout = 1;        }

        else {
            if(!empty($_POST['photo']) ) {
            $refugeController->modifierRefuge($refuge);
            $modif = 1 ;
            }
            else {
            $refugeController->modifierRefugeNoPhoto($refuge);
                $modif = 1 ;
            }
        }

    }
}

    $refuges = $refugeController->afficherRefuge();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">

    <title>ADMIN || DASHBOARD </title>


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
    <!-- /#header -->
    <!-- Content -->
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Gérer les refuges</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Accueil</a></li>
                                <li class="active">Refuges</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <!-- Animated -->

        <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <?php if($ajout==1){ ?>
                 <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                    <span class="badge badge-pill badge-primary">✓</span>
                    Refuge ajouté avec succès
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?php } else if ($modif == 1 ) { ?>
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">✓</span>
                        Refuge modifié avec succès
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                <?php } else if ( $supp == 1 ) { ?>
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        <span class="badge badge-pill badge-danger">✓</span>
                        Refuge supprimé avec succès
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                <?php } ?>
            </div>
        </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center">Ajouter un refuge</h3>

                                    </div>
                                    <hr>
                                    <form action="refuges.php" method="post" >
                                        <input hidden type="text"  required class="form-control" name="id" id="id" value="-1" style="display: none;" required>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="nom">Nom</label>
                                                    <input type="text"   required  class="form-control" name="nom" id="nom" placeholder="Nom">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="capacite">Capacite</label>
                                                    <input type="number" required class="form-control" name="capacite" id="capacite" placeholder="Capacite">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="nbr_benevoles">Nombre des benevoles</label>
                                                    <input type="number" required class="form-control" name="nbr_benevoles" id="nbr_benevoles" placeholder="Nombre des benevoles">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="adresse">Adresse</label>
                                                    <input required="true" type="text" class="form-control" name="adresse" id="adresse" placeholder="Adresse">
                                                </div>
                                            </div>
                                           
                                            

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="photo">Photo</label>
                                                    <input   type="file" accept="image/png, image/jpeg" class="form-control" name="photo" id="photo" required>
                                                </div>
                                            </div>
                                            

                                        </div>
                                        <div id="add">
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block">
                                                <i class="fa fa-check fa-lg"></i>&nbsp;
                                                <span id="payment-button-amount">Ajouter</span>
                                            </button>

                                        </div>
                                        <div id="edit" style="display: none" >
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block">
                                                <i class="fa fa-edit fa-lg"></i>&nbsp;
                                                <span id="payment-button-amount">Modifier</span>
                                            </button>

                                            <a  onclick="reset()"   class="btn btn-lg btn-danger btn-block">
                                                <i class="fa fa-arrow-left fa-lg" style="color : white;"></i>&nbsp;
                                                <span id="payment-button-amount" style="color : white;" >Annuler</span>
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div> <!-- .card -->

                </div><!--/.col-->


            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Liste des refuges</strong>
                            <div style="float : right;">
                            <button type="button" onclick="sortTableUp()" class="btn btn-outline-primary"> <i class="fa  fa-level-up"></i></button></a>
                            <button type="button" onclick="sortTableDown()" class="btn btn-outline-primary"> <i class="fa  fa-level-down"></i></button></a>
                            <a class="Export" href="pdfR.php">Pdf</a>



                            </div>
                            <br>
                            <div class="input-group" style="margin-top: 1.5%;">

                                <br>
                                <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                <input onkeyup="filterSearch()" placeholder="Chercher des nom ou le nombre des benevoles ..."  class="form-control" type="text" id="searchInput" >
                            </div>
                        </div>
                        <div class="table-stats order-table ov-h">
                            <table class="table " id="myTable">
                                <thead>
                                <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                    <th>Nom</th>
                                    <th>Capacite</th>
                                    <th>Nombre des benevoles</th>
                                    <th>Adresse</th>
                                    <th>Gérer</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($refuges as $r) {  ?>
                                <tr>
                                    <td class="serial"><?php echo $r['id']; ?></td>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <a href="" ><img class="rounded-circle" src="../photo/<?php echo $r['photo']; ?> " alt=""></a>
                                        </div>
                                    </td>
                                    <td> <?php echo $r['nom'];  ?> </td>
                                    <td>  <span class="name"><?php echo $r['capacite'];  ?></span> </td>
                                    <td> <span class="name"><?php echo $r['nbr_benevoles'];  ?></span> </td>
                                    <td><span class="name"><?php echo $r['adresse'];  ?></span></td>
                                    

                                   
                                    <td>   <button onclick="editRefuge(<?php  echo  "'" .$r['id'] . "','" .   $r['nom']   . "','" .   $r['capacite']  . "','" .  $r['nbr_benevoles']   . "','" .   $r['adresse']    . "','"  .    $r['photo']  . "'" ; ?>)" type="button" class="btn btn-outline-success"><i class="fa fa-edit"></i></button> <a href="refuges.php?deleteThisId=<?php echo $r['id']; ?>"  ><button type="button" class="btn btn-outline-danger"> <i class="fa fa-trash-o"></i></button></a> </td>
                                </tr>
                                <?php

                                }
                                ?>
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div>

            </div>

        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
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

    <script>
        function editRefuge(id,nom,capacite,nbr_benevoles,adresse,photo) {
            document.getElementById("id").value = id;
            document.getElementById("nom").value = nom;
            document.getElementById("capacite").value = capacite;
            document.getElementById("nbr_benevoles").value = nbr_benevoles;
            document.getElementById("adresse").value = adresse;
            document.getElementById("photo").value = "";
            document.getElementById("add").style.display = "none";
            document.getElementById("edit").style.display = "block";
            document.getElementById("photo").required = false;

        }

        function reset(){
            document.getElementById("id").value = "-1";
            document.getElementById("nom").value = "";
            document.getElementById("capacite").value = "";
            document.getElementById("nbr_benevoles").value = "";
            document.getElementById("adresse").value = "";
            document.getElementById("photo").value = "";
            document.getElementById("add").style.display = "block";
            document.getElementById("edit").style.display = "none";
            document.getElementById("photo").required = true;
        }
        function sortTableDown() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;
            /* Make a loop that will continue until
            no switching has been done: */
            while (switching) {
                // Start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                /* Loop through all table rows (except the
                first, which contains table headers): */
                for (i = 1; i < (rows.length - 1); i++) {
                    // Start by saying there should be no switching:
                    shouldSwitch = false;
                    /* Get the two elements you want to compare,
                    one from current row and one from the next: */
                    x = rows[i].getElementsByTagName("TD")[2];
                    y = rows[i + 1].getElementsByTagName("TD")[2];
                    // Check if the two rows should switch place:
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        // If so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    /* If a switch has been marked, make the switch
                    and mark that a switch has been done: */
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }
        function sortTableUp() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;
            /* Make a loop that will continue until
            no switching has been done: */
            while (switching) {
                // Start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                /* Loop through all table rows (except the
                first, which contains table headers): */
                for (i = 1; i < (rows.length - 1); i++) {
                    // Start by saying there should be no switching:
                    shouldSwitch = false;
                    /* Get the two elements you want to compare,
                    one from current row and one from the next: */
                    x = rows[i].getElementsByTagName("TD")[2];
                    y = rows[i + 1].getElementsByTagName("TD")[2];
                    // Check if the two rows should switch place:
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        // If so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    /* If a switch has been marked, make the switch
                    and mark that a switch has been done: */
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }
        function filterSearch() {
            var input, filter, table, tr, td,td2, i, txtValue,txtValue2;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
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
</div>
</body>
</html>