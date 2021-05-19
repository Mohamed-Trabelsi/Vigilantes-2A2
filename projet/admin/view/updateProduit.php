<?php
    require_once '../controller/categorie.php';
    require_once '../models/categorie.php';
    require_once '../controller/produit.php';
    require_once '../models/produit.php';
    
    $gererCategorie =  new gererCategorie();
    $categories = $gererCategorie -> afficherCategorie();
    $produitG =  new gererProduit();
  
    if (isset($_POST['nom']) && isset($_POST['categorie']) && isset($_POST['description']) && isset($_POST['prix']) && isset($_POST['img']) && isset($_POST['date']) && isset($_POST['qte'])) 
    {
        $produit = new produit($_POST['nom'],$_POST['idcategorie'],$_POST['description'],$_POST['prix'],$_POST['img'],$_POST['date'],$_POST['qte']);
        
        $produitG->updateProduit($produit,$_GET['idP']);
    }
    ////
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
        if (isset($_GET['idP'])) {
            $result = $produitG->getProduitById($_GET['idP']);
			if ($result !== false) {
    ?>
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
                                        <h3 class="text-center">Modifier un produit</h3>

                                    </div>
                                    <hr>
                                    <form action="" method="post"  id="theForm"   >
                                        <input hidden type="text"  required class="form-control" name="id" id="id" value="-1" style="display: none;" >
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="nom">Nom</label>
                                                    <input type="text"   required  class="form-control" name="nom" id="nom" value = "<?= $result['nomP'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="categorie">Categorie</label>
                                                    
                                                    <select required  class="form-control" name="categorie" id="categorie">
                                        
          <?php
                      foreach ($categories as $categorie) {
          ?>
          <option value="<?=$categorie['idC'] ?>"
                         
selected

            >
            <?= $categorie['nomC'] ?>
            
          </option>
          <?php } ?>
          
        </select>
                                            </div>
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="description">Description</label>
                                                    <textarea required name="description" class="form-control" id="description" rows="5"  ></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="prix">Prix</label>
                                                    <input  type="number" class="form-control" name="prix" id="prix" value = "<?= $result['prixP'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                 <div class="form-group">
                                                    <label class="label" for="img">Image</label>
                                                    <input   type="file" class="form-control" name="img" id="img" required >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="date">Date d'ajout</label>
                                                    <input  type="date" class="form-control" name="date" id="date" value = "<?= $result['dateA'] ?>" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="qte">Quantité</label>
                                                    <input   type="number" class="form-control" name="qte" id="qte" required value = "<?= $result['qte'] ?>" >
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
            header('Location:produit.php');
        }
    
    ?>
	
</body>

</html>