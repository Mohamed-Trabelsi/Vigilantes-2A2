<?PHP
include "../../controller/commandeC.php";
$c2 = new commandeC();
$listeevent=$c2->afficherCommande();
?>
<!DOCTYPE html>
<html>
  <title></title>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Collapsed Sidebar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="dashboard.css">
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand custom-nav">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../Mode_invite/accueil.html" class="nav-link">Accueil</a>
      </li>
    
    <!-- SEARCH FORM -->
       <form class="form-inline ml-3" method="GET" action="rechercherCommande.php">
      <li class="nav-item">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="recherche" value="search"> 
      </li>   
          <select class="form-control form-control-navbar" name="champs">
             <option value="id_utilisateur">id_utilisateur</option> 
             <option value="id_commande" selected>id_commande</option>
             <option value="prix_total">prix_total</option>
             <option value="mode_de_payement">mode_de_payement</option>
          </select>
           <input type="radio" name="tri"  value="decroissant" class="form-control form-control-navbar" > <p> ordre decroissant </p>
           <input type="radio" name="tri"  value="croissant" class="form-control form-control-navbar" checked="checked" > <p> ordre croissant </p>
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>

              </ul>

    </form>

    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar custom-nav">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../logo.jpg"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MEW - Admin</span>
    </a>

    <!-- Sidebar -->
      <div class="sidebar">
    
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-close custom-nav-item">
            <a href="#" class="nav-link custom-link ">
              <i class="nav-icon fas fa-bookmark custom-icon"></i>
              <p>
               Gestion des categories
               </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="ajoutCategorie.html" class="nav-link ">
                  <i class="far fa-circle nav-icon custom-icon"></i>
                  <p>Ajouter une categorie</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="afficherCategorie.php" class="nav-link">
                  <i class="far fa-circle nav-icon custom-icon"></i>
                  <p>Afficher les categories</p>
                </a>
              </li>

            </ul>

          </li>
          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link custom-link ">
              <i class="nav-icon fas fa-tags custom-icon"></i>
              <p>
                Gestion des produits
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="ajoutProduit.php" class="nav-link">
                  <i class="far fa-circle nav-icon custom-icon"></i>
                  <p>Ajouter un produit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="afficherProduit.php" class="nav-link">
                  <i class="far fa-circle nav-icon custom-icon"></i>
                  <p>Afficher les produits</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="chart.php" class="nav-link">
                  <i class="far fa-circle nav-icon custom-icon"></i>
                  <p>Stock</p>
                </a>
              </li>
             </ul>
            </li>

<li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link custom-link ">
              <i class="nav-icon fas fa-file-signature custom-icon"></i>
              <p>
                Gestion des reclamation
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="afficherreclamation.php" class="nav-link ">
                  <i class="far fa-circle nav-icon custom-icon"></i>
                  <p>Consuler les reclamations</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="ajoutertypee.php" class="nav-link ">
                  <i class="far fa-circle nav-icon custom-icon"></i>
                  <p>Ajouter un type de 
                  reclamation</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="affichertype.php" class="nav-link ">
                  <i class="far fa-circle nav-icon custom-icon"></i>
                  <p>Afficher les types de 
                  reclamation</p>
                </a>
              </li>
            </ul>
</li>

 <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link custom-link ">
              <i class="nav-icon fas fa-truck custom-icon"></i>
              <p>
                Gestion des livraisons
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="afficherlivraison.php" class="nav-link ">
                  <i class="far fa-circle nav-icon custom-icon"></i>
                  <p>Afficher les livraisons</p>
                </a>
              </li>
            </ul>
          </li>
         <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link custom-link ">
              <i class="nav-icon fas fa-people-carry custom-icon"></i>
              <p>
                Gestion des livreurs
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="ajoutlivreur.html" class="nav-link ">
                  <i class="far fa-circle nav-icon custom-icon"></i>
                  <p>Ajouter un livreurs</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="afficherlivreur.php" class="nav-link ">
                  <i class="far fa-circle nav-icon custom-icon"></i>
                  <p>Afficher les livreurs</p>
                </a>
              </li>
              </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="chartlivreur.php" class="nav-link ">
                  <i class="far fa-circle nav-icon custom-icon"></i>
                  <p>Statistique des secteurs</p>
                </a>
              </li>
            </ul>
          </li>
       
          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link custom-link ">
              <i class="nav-icon fas fa-hand-holding-usd custom-icon"></i>
              <p>
                Gestion de Commande
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="AfficherCommande.php" class="nav-link ">
                  <i class="far fa-circle nav-icon custom-icon"></i>
                  <p>Afficher les commandes</p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link custom-link ">
              <i class="nav-icon fas fa-star-half-alt custom-icon"></i>
              <p>
                Gestion des avis-client
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="afficheravisclient.php" class="nav-link ">
                  <i class="far fa-circle nav-icon custom-icon"></i>
                  <p>Consulter les avis-client</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="chartavis.php" class="nav-link ">
                  <i class="far fa-circle nav-icon custom-icon"></i>
                  <p>Statistique</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link custom-link ">
              <i class="nav-icon fas fa-comment custom-icon"></i>
              <p>
                Gestion de forum
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Modifiersujet.php" class="nav-link ">
                  <i class="far fa-circle nav-icon custom-icon"></i>
                  <p>Modifer les sujets</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <table id="tab_prod_ajouter">
  <tr> <td colspan="2" id="titre">Afficher les commandes
  </td></tr>
  
<tr>
  <th>Id_Commande</th>
  <th>Id_utilisateur</th>
  <th>Prix total</th>
  <th>Mode de livraison</th>
 
</tr>
<tr>
  <?php
  foreach($listeevent as $row) {
  ?>
  <tr>
  <td><?PHP echo $row['id_commande']; ?></td>
  <td><?PHP echo $row['id_utilisateur']; ?></td>
  <td><?PHP echo $row['prix_total']; ?></td>
  <td><?PHP echo $row['mode_de_payement']; ?></td>
  <td><form method="POST" action="supprimerCommande.php">
  <input type="submit" name="supprimer" value="supprimer">
  <input type="hidden" value="<?PHP echo $row['id_commande']; ?>" name="id_commande">
 </form>
  </td>

  </tr>
  <?php
  }
  ?>

</table>


  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>