 <?php
    require_once '../controller/produit.php';
    require_once '../models/produit.php';
    require_once '../controller/categorie.php';
    require_once '../models/categorie.php';
$gererCategorie =  new gererCategorie();
$categories = $gererCategorie -> afficherCategorie();
 session_start();
 $produitG =  new gererProduit();
 $produits = $produitG->afficherProduit();
  if ((isset($_POST['nomp'])&&($_POST['nomp']!="")) && isset($_POST['categorie']) && isset($_POST['descriptionp']) && isset($_POST['prixp']) && isset($_POST['imagep']) && isset($_POST['dateAp']) && isset($_POST['qte'])) {
        $produit = new produit($_POST['nomp'], $_POST['categorie'], $_POST['descriptionp'], $_POST['prixp'], $_POST['imagep'], $_POST['dateAp'],$_POST['qte']);
        $produitG->ajouterProduit($produit);
        echo('record added');
        header('Location:produit.php');
    }

    if (isset($_GET['idP'])) 
    {
        $produitG->deleteProduit($_GET['idP']);
        header('Location:produit.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">

    <title>Les Produits </title>


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
    <!-- /#header -->
    <!-- Content -->
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Gérer les Produits</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Accueil</a></li>
                                <li class="active">Produits</li>
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
                                        <h3 class="text-center">Ajouter un produit</h3>

                                    </div>
                                    <hr>
                                    <form action="produit.php" method="post"  id="theForm"   >
                                        <input hidden type="text"  required class="form-control" name="id" id="id" value="-1" style="display: none;" >
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="nomp">Nom</label>
                                                    <input type="text"   required  class="form-control" name="nomp" id="nomp" placeholder="Nom">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="categorie">Categorie</label>
                                                    
                                                    <select required  class="form-control" name="categorie" id="categorie">
                                                     <?php
                                                          foreach ($categories as $categorie) {
                                                     ?>
          
                                                           <option value="<?= $categorie['idC'] ?>">
                                                                <?= $categorie['nomC'] ?>
                                                           </option>
                                                           <?php } ?>

                                                 </select>
                                            </div>
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="descriptionp">Description</label>
                                                    <textarea required name="descriptionp" class="form-control" id="descriptionp" rows="5" placeholder="Description du Produit ..."></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="prixp">Prix</label>
                                                    <input  type="number" class="form-control" name="prixp" id="prixp" placeholder="Prix">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                 <div class="form-group">
                                                    <label class="label" for="imagep">Image</label>
                                                    <input   type="file" class="form-control" name="imagep" id="imagep" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="dateAp">Date d'ajout</label>
                                                    <input  type="date" class="form-control" name="dateAp" id="dateAp" placeholder="Date d'ajout" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="qte">Quantité</label>
                                                    <input   type="number" class="form-control" name="qte" id="qte" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div id="add">

                                            <button id="payment-button" onclick="Envoyer()"  class="btn btn-lg btn-success btn-block">
                                                <i class="fa fa-check fa-lg"></i>&nbsp;
                                                <span id="payment-button-amount">Ajouter</span>
                                            </button>

                                        </div>
                                       
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div> <!-- .card -->

                </div><!--/.col-->


            </div>


            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Liste des produits</strong>
                            
                                <a class="Export" href="excel.php">excel</a>

                         
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
                                    
                                    <th>Gérer</th>
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
                                    <td>  

                        <td><a type="button" class="btn btn-info" href = "updateProduit.php?idP=<?= $produit['idP'] ?>">Modifier</a>
                        <a type="button" class="btn btn-danger" href = "produit.php?idP=<?= $produit['idP'] ?>">Supprimer</a> </td>
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