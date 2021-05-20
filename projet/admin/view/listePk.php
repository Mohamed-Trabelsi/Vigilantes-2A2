<?php
    require_once '../controller/produit.php';
    require_once '../controller/pack.php';
    $packG =  new gererPack();
session_start();
	$packs = $packG->afficherPack();

		//header('Location:listeC.php');
	if (isset($_GET['idPk'])) 
	{
		$packG->deletePack($_GET['idPk']);
		header('Location:listePk.php');
	}
////
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">

    <title>Liste des Packs </title>


   <?php include_once 'headerd.php'; ?> 

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
<div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Gérer les Packs</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Accueil</a></li>
                                <li class="active">Packs</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
<div class="animated fadeIn">
	<div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Liste des packs</strong>
                            
                                

                         
                        <div class="table-stats order-table ov-h">
                            <table class="table " id="myTable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Nom</th>
                                    <th>Prix</th>
                                    <th>Date début</th>
                                    <th>Date fin</th>
                                    <th>Quantité</th>
                                    <th>Description</th>
                                    
                                    <th>Gérer</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($packs as $pack) {  ?>
                                <tr>
                                    <td class="serial"><?php echo $pack['idPk']; ?></td>
                                     <td class="avatar">
                                        <div class="round-img">
                                            <a href="" ><img class="rounded-circle" src="../photo/<?php echo $pack['img']; ?> " alt=""></a>
                                        </div>
                                    </td>
                                    <td> <?php echo $pack['nompk'];  ?> </td>
                                    <td> <?php echo $pack['prix'];  ?> TND</td>
                                    <td> <?php echo $pack['dateD'];  ?> </td>
                                    <td> <?php echo $pack['dateF'];  ?> </td>
                                    <td> <?php echo $pack['quantite'];  ?></td>
                                    <td> <?php echo $pack['description'];  ?> </td>
                                    <td>  

                        <td><a type="button" class="btn btn-info" href = "updatePack.php?idPk=<?= $pack['idPk'] ?>">Modifier</a>
                        <a type="button" class="btn btn-danger" href = "listePk.php?idPk=<?= $pack['idPk'] ?>">Supprimer</a> </td>
                                </tr>
                                <?php

                                }
                                ?>
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                             
</body>