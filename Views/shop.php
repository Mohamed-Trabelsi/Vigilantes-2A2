<?php

    require_once '../Controller/categorie.php';
    require_once '../Models/categorie.php';
    require_once '../Controller/produit.php';
    require_once '../Models/produit.php';
    $gererCategorie =  new gererCategorie();
    $categories = $gererCategorie -> afficherCategorie();
    
    if (isset($_POST['nomc'])&&($_POST['nomc']!="") && isset($_POST['date'])) {
        $categorie = new categorie($_POST['nomc'], $_POST['date']);
        $gererCategorie->ajouterCategorie($categorie);
        echo('record added');
        header('Location:listeC.php');
    }

   $gererProduit = new gererProduit();
  if ((isset($_POST['nomp'])&&($_POST['nomp']!="")) && isset($_POST['categorie']) && isset($_POST['descriptionp']) && isset($_POST['prixp']) && isset($_POST['imagep']) && isset($_POST['dateAp']) && isset($_POST['qte'])) {
        $produit = new produit($_POST['nomp'], $_POST['categorie'], $_POST['descriptionp'], $_POST['prixp'], $_POST['imagep'], $_POST['dateAp'],$_POST['qte']);
        $gererProduit->ajouterProduit($produit);
        echo('record added');
        header('Location:shop.php');
    }
    
    ?>
 <!DOCTYPE html>
<html lang="en">

  <head>
    <?php include_once 'header.php'; ?>
  </head>
  <body>
 <?php include_once 'nav-bar.php'; ?>
    <div id="right-panel" class="right-panel">
      <div class="content">
    <h2>Gestion de la boutique</h2>
    <hr>
     <br><br>
       <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Ajout des catégories </h4>
                            </div>
                            <div class="row">
<form action="" method="post">
                                <table border="1" width="40%">

          <tr>
            <td>
              <label for="nomc">Nom:
              </label>
            </td>
            <td><input type="text" name="nomc" id="nomc" ></td>
          </tr>
          <tr>
            <td>
              <label for="datec">Date d'ajout:
              </label>
            </td>
            <td><input type="date" name="date" id="date" ></td>
          </tr>
        </table>
      <br><br>
      <input type="submit" name="submitC" value="Ajouter">
      </form>
                            </div> <!-- /.row -->
                            <div class="card-body"></div>
                        </div>
                    </div><!-- /# column -->
                </div>
  
        <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Ajout des produits </h4>
                            </div>
                            <div class="row">
        
      <form id="" action="" method="POST" >
<table border="1" width="40%">
         <tr>
<td>
  <label for="nomp">Nom:
    </label>
</td>
<td><input type="text" name="nomp" id="nomp" ></td>
<tr>
<td>
<label for="categorie">ID de la catégorie:
    </label>
</td>
<td>
<!--<input type="text" name="categorie" id="categorie" >  -->
       <select name="categorie" id="categorie">
          <?php
                      foreach ($categories as $categorie) {
          ?>
          
          <option value="<?= $categorie['idC'] ?>">
            <?= $categorie['nomC'] ?>
         </option>
          <?php } ?>

        </select>
</td>
</tr>
<tr>
<td>
  <label for="descriptionp">Description:
    </label>
    </td>
    <td>
    <textarea name="descriptionp" id="descriptionp" clos="30" rows="5"></textarea>
</td>
</tr>
<tr>
<td>
  <label for="prixp">Prix:
    </label>
    <td><input type="number" name="prixp" id="prixp" ></td>
</td>
</tr>
<tr>
<td>
  <label for="imagep">Image:
    </label>
    <td><input type="file" name="imagep" id="imagep" ></td>
</td>
</tr>

<tr>
<td>
  <label for="dateAp">Date d'ajout:
    </label>
    <td><input type="date" name="dateAp" id="dateAp" ></td>
</td>
</tr>
<tr>
<td>
  <label for="qte">Quantité:
    </label>
    <td><input type="number" name="qte" id="qte" ></td>
</td>
</tr>
</table>
<br><br>
<input type="submit" name="submitP" value="Ajouter">
</form>
</div> <!-- /.row -->
                            <div class="card-body"></div>
                        </div>
                    </div><!-- /# column -->
                </div>

      
    

</body>
<?php include_once 'footer.php'; ?>
</div>
</div>
</html>