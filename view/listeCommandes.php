<?php
include "../controller/CommandeC.php";
$listeCommande= (new CommandeC())->afficherCommande('1234');
if(isset($_GET['search'])){
    $listeCommande= (new CommandeC())->rechercherCommande($_GET['search']);

}
if (isset($_POST['Filter']))
    { if($_POST['Filter']=="id_commande")
        {$listeCommande = (new CommandeC())->filtre_idcommande();}
        elseif ($_POST['Filter']=="prix_total") {
         $listeCommande = (new CommandeC())->filtre_prixtotal();}
         elseif ($_POST['Filter']=="id_utilisateur") {
         $listeCommande = (new CommandeC())->filtre_idutilisateur();}
         
         }

?>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container mt-4">
   <h1 style="color: #17a2b8;text-align: center">La liste des Commandes : </h1>
<form method="get">
    <label>
        <input type="text" placeholder="Taper ici .... " name="search" class="form-control" />
    </label>
    <button class="btn btn-info">Rechercher</button>
</form>
<form action="" method = "POST">
                          <select class="custom-select browser-default" name="Filter">
                              <option selected value="id_commande">id_commande</option>
                              <option value="prix_total">prix_total</option>
                              <option value="id_utilisateur">id_utilisateur</option>
                              
        </select>
        <button class="btn btn-block btn-primary">Filter</button>
              </form>
<table class="table" >
    <thead class="thead-dark">
    <tr>
        <th>Id commande</th>
        <th>Id client</th>
        <th>Prix totale</th>
        <th>Mode de payement</th>
        <th>Produits</th>
        <th>Description</th>
        <th>supprimer</th>
    </tr>
    </thead>
    <tbody>
    <?PHP
    foreach($listeCommande as $row){
        ?>
        <tr>
            <td><?PHP echo $row['id_commande']; ?></td>
            <td><?PHP echo $row['id_utilisateur']; ?></td>
            <td><?PHP echo $row['prix_total']; ?></td>
            <td><?PHP echo $row['mode_de_payement']; ?></td>
            <td><?PHP echo $row['produits']; ?></td>
            <td><?PHP echo $row['description_commande']; ?></td>
            <td><form method="POST" action="supprimerCommande.php">
                    <input type="submit" name="supprimer" value="supprimer" class="btn btn-danger">
                    <input type="hidden" value="<?PHP echo $row['id_commande']; ?>" name="id_commande">
                </form>
            </td>

        </tr>
        <?PHP
    }
    ?>
    </tbody>
</table >
</div>
</body>
</html>