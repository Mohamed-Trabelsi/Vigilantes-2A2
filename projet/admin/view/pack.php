<?php
    require_once '../Controller/produit.php';
    require_once '../Controller/pack.php';
    require_once '../Models/pack.php';
     $produitG =  new gererProduit();
session_start();
     $produits = $produitG->afficherProduit();

 $gererPack = new gererPack();

  if (isset($_POST['choix']) && (isset($_POST['nompc'])&&($_POST['nompc']!="")) && isset($_POST['imagepk']) && isset($_POST['descriptionpc']) && isset($_POST['prixpc']) && isset($_POST['qte']) && isset($_POST['dateD']) && isset($_POST['dateF'])) {
        /*$id = $_POST['choix'];
        $chk="";
     foreach ($is as $chk1 ) 
      {
       $chk.=$chk1;
      }*/

        $pack = new pack($_POST['nompc'],$_POST['descriptionpc'], $_POST['prixpc'], $_POST['imagepk'], $_POST['dateD'],$_POST['dateF'],$_POST['qte'], $_POST['choix']);
        $gererPack->ajouterPack($pack);
        echo('record added');
        header('Location:pack.php');
    }
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
                                        <h3 class="text-center">Ajouter un pack</h3>

                                    </div>
                                    <hr>
                                    <form action="pack.php" method="post"  id="theForm"   >
                                        <input hidden type="text"  required class="form-control" name="id" id="id" value="-1" style="display: none;" >
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="nompc">Nom</label>
                                                    <input type="text"   required  class="form-control" name="nompc" id="nompc" placeholder="Nom">
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
                                                    <input  type="number" class="form-control" name="prixpc" id="prixpc" placeholder="Prix">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="qte">Quantité</label>
                                                    <input   type="number" class="form-control" name="qte" id="qte" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="dateD">Date début</label>
                                                    <input  type="date" class="form-control" name="dateD" id="dateD" placeholder="Date début" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="dateF">Date fin</label>
                                                    <input  type="date" class="form-control" name="dateF" id="dateF" placeholder="Date fin" required>
                                                </div>
                                            </div>

                                        </div>
                                        
                                       
                                    
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
                            <div id="add">

                                            <button id="payment-button" onclick="Envoyer()"  class="btn btn-lg btn-success btn-block">
                                                <i class="fa fa-check fa-lg"></i>&nbsp;
                                                <span id="payment-button-amount">Ajouter</span>
                                            </button>

                                        </div>
                                        </form>
                        </div> <!-- /.table-stats -->
                        </body>
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

</div>
</body>
</html>