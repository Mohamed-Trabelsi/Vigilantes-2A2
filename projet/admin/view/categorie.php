<?php

    require_once '../controller/categorie.php';
    require_once '../models/categorie.php';
session_start();
$gererCategorie =  new gererCategorie();
    $categories = $gererCategorie -> afficherCategorie();
if (isset($_POST['nomc'])&&($_POST['nomc']!="") && isset($_POST['date'])) {
        $categorie = new categorie($_POST['nomc'], $_POST['date']);
        $gererCategorie->ajouterCategorie($categorie);
        echo('record added');
        header('Location:categorie.php');
    }
    else if ($_POST['nomc']!="")
     ?>
     <script>Vérifier les champs vides</script>     
<?php
    if (isset($_GET['idC'])) 
    {
        $gererCategorie->deleteCategorie($_GET['idC']);
        header('Location:categorie.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">

    <title>Les Catégories </title>


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
                            <h1>Gérer les categories</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Accueil</a></li>
                                <li class="active">Categories</li>
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
                                        <h3 class="text-center">Ajouter une categorie</h3>

                                    </div>
                                    <hr>
                                    <form action="categorie.php" method="post"  id="theForm"   >
                                        <input hidden type="text"  required class="form-control" name="id" id="id" value="-1" style="display: none;" >
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="nom">Nom</label>
                                                    <input type="text"   required  class="form-control" name="nomc" id="nom" placeholder="Nom">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="age">Date d'ajout</label>
                                                    <input type="date" required class="form-control" name="date" id="date" placeholder="Date d'ajout">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Liste des categories</strong>
                            
                                <a class="Export" href="pdfC.php">Pdf</a>

                         
                        <div class="table-stats order-table ov-h">
                            <table class="table " id="myTable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Date d'ajout</th>
                                    <th>Gérer</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($categories as $categorie) {  ?>
                                <tr>
                                    <td class="serial"><?php echo $categorie['idC']; ?></td>
                                    <td> <?php echo $categorie['nomC'];  ?> </td>
                                    <td> <?php echo $categorie['dateC'];  ?> </td>
                                    <td>  

                        <td><a type="button" class="btn btn-info" href = "updateCategory.php?idC=<?= $categorie['idC'] ?>">Modifier</a>
                        <a type="button" class="btn btn-danger" href = "categorie.php?idC=<?= $categorie['idC'] ?>">Supprimer</a> </td>
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