<?php
//
    require_once '../Controller/categorie.php';
    require_once '../entities/categorie.php';

    $gererCategorie =  new gererCategorie();

    if (isset($_POST['nomc'])&&($_POST['nomc']!="") && isset($_POST['date'])) {
        $categorie = new categorie($_POST['nomc'], $_POST['date']);
        $gererCategorie->ajouterCategorie($categorie);
        echo('record added');
        header('Location:listeC.php');
    }
  
    ?>
 <!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<select name="id">
<option>choix</option>
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
    <td><input type="text" name="prixp" id="prixp" ></td>
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
</form>
<br><br>
<input type="submit" name="submitP" value="Ajouter">
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