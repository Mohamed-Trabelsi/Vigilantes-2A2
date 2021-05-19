<?php
    require_once '../controller/categorie.php';
    require_once '../models/categorie.php';

    $categorieG =  new gererCategorie();
     session_start();
    if (isset($_POST['nom']) && isset($_POST['date'])) 
    {
        $categorie = new categorie($_POST['nom'],$_POST['date']);
        
        $categorieG->updateCategorie($categorie,$_GET['idC']);
    }
    ////
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">

    <title>Les Catégories </title>


<?php include_once 'headerd.php'; ?> 
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

<body>
      <div class="content">
    <?php
        if (isset($_GET['idC'])) {
            $result = $categorieG->getCategorieById($_GET['idC']);
			if ($result !== false) {
    ?>
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
                                        <h3 class="text-center">Modifier une categorie</h3>

                                    </div>
                                    <hr>
                                    <form action="" method="post"  id="theForm"   >
                                        <input hidden type="text"  required class="form-control" name="id" id="id" value="-1" style="display: none;" >
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="nom">Nom</label>
                                                    <input type="text"   required  class="form-control" name="nom" id="nom" value="<?= $result['nomC'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="date">Date d'ajout</label>
                                                    <input type="date" required class="form-control" name="date" id="date" value="<?= $result['dateC'] ?>">
                                                </div>
                                            </div>

                                        </div>
                                        <div id="add">

                                            <button id="payment-button" onclick="Envoyer()"  class="btn btn-lg btn-success btn-block">
                                                <i class="fa fa-check fa-lg"></i>&nbsp;
                                                <span id="payment-button-amount">Modifier</span>
                                            </button>

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
            header('Location:categorie.php');
        }
    
    ?>
	</div>
</div>
</body>

</html>