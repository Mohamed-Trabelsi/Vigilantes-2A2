<?php
//
    require_once '../Controller/categorie.php';
    require_once '../entities/categorie.php';
    require_once '../Controller/produit.php';
    require_once '../entities/produit.php';
    $gererCategorie =  new gererCategorie();
    $categories = $gererCategorie -> afficherCategorie();
    $gererProduit = new gererProduit();
    if (isset($_POST['nomc'])&&($_POST['nomc']!="") && isset($_POST['date'])) {
        $categorie = new categorie($_POST['nomc'], $_POST['date']);
        $gererCategorie->ajouterCategorie($categorie);
        echo('record added');
        header('Location:listeC.php');
    }
  
  if (isset($_POST['nomp'])&&($_POST['nomp']!="") && isset($_POST['prixp']) && isset($_POST['descriptionp']) && isset($_POST['imagep'])  && isset($_POST['dateAp']) ) {
        $produit = new produit($_POST['nomp'], $_POST['prixp'], $_POST['descriptionp'], $_POST['imagep'], $_POST['dateAp']);
        $gererProduit->ajouterProduit($produit);
        echo('record added');
        header('Location:shop.php');
    }

    ?>
 <!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'header.php'; ?>
    <title>Gestion de la boutique</title>
  </head>
  <body>
    <h2>Gestion de la boutique</h2>
      <hr>
      <div>
        <br><br>
<form action="" method="POST">
        <table border="1" width="40%">

          <tr>
            <td rowspan='2' colspan='1'>Catégories</td>
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
        <br><br>
        <hr>
        <br><br>
      <form action="" method="post">

        <table border="1" width="40%">
         <tr>
<td rowspan="6">Produits</td>
<td>
  <label for="nomp">Nom:
    </label>
</td>
<td><input type="text" name="nomp" id="nomp" ></td>
<tr>
<td>
<label for="id">ID de la catégorie:
    </label>
</td>
<td>
<select name="idcategorie" id="idcategorie">
          <?php
                      foreach ($categories as $categorie) {
          ?>
          <option value="<? $categorie['idC'] ?>"
                         <?php
                              if (isset ($_POST['submitP']) && $categorie['idC']===$_POST['categorie']) {
                         ?>
selected
<?php } ?>
            >
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
</tr>
</table>
<br><br>
<input type="submit" name="submitP" value="Ajouter">
</form>

<br><br>
<hr>
<br><br>
 <form action="" method="post">
        <table border="1" width="40%">
         <tr>

<td rowspan="7">Packs</td>
<td>
  <label for="nompc">Nom:
    </label>
</td>
<td><input type="text" name="nompc" id="nompc" ></td>
<tr>
<td>
<label for="idpc">ID des produits:
    </label>
</td>
<td>
<select name="idpc">
<option>choix</option>
</select>
</td>
</tr>
<tr>
  <tr>
<td>
  <label for="descriptionpc">Description:
    </label>
    </td>
    <td>
    <textarea name="descriptionpc" id="descriptionpc" clos="30" rows="5"></textarea>
</td>
</tr>
<tr>
<td>
  <label for="prixpc">Prix:
    </label>
    <td><input type="text" name="prixpc" id="prixpc" ></td>
</td>
</tr>
<tr>
<td>
  <label for="dateD">Date début:
    </label>
  </td>
    <td><input type="date" name="dateD" id="dateD" ></td>
</tr>
<tr>
<td>
  <label for="dateF">Date fin:
    </label>
  </td>
    <td><input type="date" name="dateF" id="dateF" ></td>
</tr>



        </table>
      </form>
      <br><br>
      <input type="submit" name="submitPC" value="Ajouter">
    </div>

</body>
</html>