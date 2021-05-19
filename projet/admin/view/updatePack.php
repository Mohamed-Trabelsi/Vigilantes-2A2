<?php
    require_once '../controller/pack.php';
    require_once '../models/pack.php';
 require_once '../Controller/produit.php';
    $packG =  new gererPack();
    $produitG =  new gererProduit();
     $produits = $produitG->afficherProduit();
    if  (isset($_POST['choix']) && (isset($_POST['nompc'])&&($_POST['nompc']!="")) && isset($_POST['imagepk']) && isset($_POST['descriptionpc']) && isset($_POST['prixpc']) && isset($_POST['qte']) && isset($_POST['dateD']) && isset($_POST['dateF']))
    {
         $pack = new pack($_POST['nompc'],$_POST['descriptionpc'], $_POST['prixpc'], $_POST['imagepk'], $_POST['dateD'],$_POST['dateF'],$_POST['qte'], $_POST['choix']);
        
        $packG->updatePack($pack,$_GET['idPk']);

    }
    ////
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">

    <title>Les Packs </title>


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

            <a class="navbar-brand" href="./"><img src="../assets/img/logo.png" alt="Logo" height="50" width="50"></a>




        </div>
        <div class="top-right">
            <div class="header-menu">
                <div class="header-left">
                    
                    <button class="search-trigger"><i class="fa fa-search"></i></button>
                    <div class="form-inline">
                        <form class="search-form">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>

                    <div class="dropdown for-notification">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">3</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                            <a class="dropdown-item media" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                        </div>
                    </div>

                    <div class="dropdown for-message">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-envelope"></i>
                            <span class="count bg-primary">4</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">You have 4 Mails</p>
                            <a class="dropdown-item media" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <div class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                    <p>Hello, this is an example msg</p>
                                </div>
                            </a>
                            <a class="dropdown-item media" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <div class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </div>
                            </a>
                            <a class="dropdown-item media" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <div class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                    <p>Hello, this is an example msg</p>
                                </div>
                            </a>
                            <a class="dropdown-item media" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                <div class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="user-area dropdown float-right">


                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                        <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                        <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                        <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>
                    </div>
                </div>

            </div>
        </div>
    </header>
<body>
	<?php
        if (isset($_GET['idPk'])) {
            $result = $packG->getPackById($_GET['idPk']);
            if ($result !== false) {
    ?>
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
        <!-- Animated -->

        <div class="animated fadeIn">
        

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center">Modifier un pack</h3>

                                    </div>
                                    <hr>
                                     
                                    <form action="pack.php" method="post"  id="theForm"   >
                                        <input hidden type="text"  required class="form-control" name="id" id="id" value="-1" style="display: none;" >
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="nompc">Nom</label>
                                                    <input type="text"   required  class="form-control" name="nompc" id="nompc" value = "<?= $result['nompk'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                               
                                                  <div class="form-group">
                                                    <label class="label" for="imagepk">Image</label>
                                                    <input   type="file" class="form-control" name="imagepk" id="imagepk" required>
                                                  </div>
                                            
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="descriptionpc">Description</label>
                                                    <textarea required name="descriptionpc" class="form-control" id="descriptionpc" rows="5" placeholder="Description du Produit ..."></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="prixpc">Prix</label>
                                                    <input  type="number" class="form-control" name="prixpc" id="prixpc" value = "<?= $result['prix'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="qte">Quantité</label>
                                                    <input   type="number" class="form-control" name="qte" id="qte" value = "<?= $result['quantite'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="dateD">Date début</label>
                                                    <input  type="date" class="form-control" name="dateD" id="dateD" value = "<?= $result['dateD'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="dateF">Date fin</label>
                                                    <input  type="date" class="form-control" name="dateF" id="dateF" value = "<?= $result['dateF'] ?>" required>
                                                </div>
                                            </div>
                                           








<div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Liste des produits</strong>
                            
                                

                         
                        <div class="table-stats order-table ov-h">
                            <table class="table " id="myTable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Nom</th>
                                    <th>categorie</th>
                                    <th>Prix</th>
                                    <th>Date d'ajout</th>
                                    <th>Quantité</th>
                                    <th>Description</th>
                                    
                                    <th>Ajouter au pack</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($produits as $produit) {  ?>
                                <tr>
                                    <td class="serial"><?php echo $produit['idP']; ?></td>
                                     <td class="avatar">
                                        <div class="round-img">
                                            <a href="" ><img class="rounded-circle" src="../assets/img/<?php echo $produit['imageP']; ?> " alt=""></a>
                                        </div>
                                    </td>
                                    <td> <?php echo $produit['nomP'];  ?> </td>
                                    <td> <?php echo $produit['categorie'];  ?> </td>
                                    <td> <?php echo $produit['prixP'];  ?> TND</td>
                                    <td> <?php echo $produit['dateA'];  ?> </td>
                                    <td> <?php echo $produit['qte'];  ?></td>
                                    <td> <?php echo $produit['descriptionP'];  ?> </td>
                                      

                        <td> <center> <input type="checkbox" name="choix" value="<?= $produit['idP'] ?>"> </center></td>
                      
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









                                            <div class="col-md-6">
                                        <div id="add">

                                            <button id="payment-button" onclick="Envoyer()"  class="btn btn-lg btn-success btn-block">
                                                <i class="fa fa-check fa-lg"></i>&nbsp;
                                                <span id="payment-button-amount">Modifier</span>
                                            </button>

                                        </div>
                                       </div>
                                    </form>
                                        
                                        
                                       
                                    
                                </div>
                            </div>

                        </div>
                    </div> <!-- .card -->

                </div><!--/.col-->

 <?php
        }
    }
        else {
            header('Location:listePk.php');
        }
    
    ?>
            </div>