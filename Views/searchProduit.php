<?php
require_once '../Controller/categorie.php';
require_once '../entities/categorie.php';
require_once '../entities/produit.php';
require_once '../Controller/produit.php';


$gererCategorie = new gererCategorie();
$gererProduit = new gererProduit();
$categories = $gererCategorie -> afficherCategorie();
if (isset ($_POST['categorie']) && isset ($_POST['search']))
{
	//$list = $gererCategorie->afficherProduit($_POST['categorie']);
$list=$gererProduit->afficher();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Créer un pack</title>
	 <?php include_once 'header.php'; ?>
</head>
<body>
	<?php include_once 'nav-bar.php'; ?>
	<div id="right-panel" class="right-panel">
      <div class="content">
<div class="form-container">
	<form action="" method = "POST">
		<div class="row">
			<div class="col-25">
				<label>Search:</label>
			</div> 
			<div class="col-75">
				<select name="categorie" id="categorie">
					<?php
                       foreach ($categories as $categorie) {
					?>
					<option value="<?=$categorie['idC'] ?>"
                         <?php
                              if (isset ($_POST['search']) && $categorie['idC']===$_POST['categorie']) {
                         ?>
selected
<?php } ?>
						>
						<?= $categorie['nomC'] ?>
						
					</option>
					<?php } ?>
					
				</select>
			</div>
		</div>

		<br>
		<div class="row">
			<input type="submit" value="Search" name = "search">
		</div>
	</form>
</div>
<?php
if (isset($_POST['search']))
{
?>
<section class="container">
	<br><br>
	<h2>Produits</h2>
	<br><br>
	<div class="shop-items">
		<table class="table">
	<thead>
	<tr>
		<th>ID</th>
		<th>Nom</th>
		<th>Categorie</th>
		<th>Prix</th>
		<th>Quantité</th>
		<th>Date d'ajout</th>
		<th>Ajouter au pack</th>
	</tr>
	</thead>
	<?php
					foreach ($list as $produit) {
				?>
<tr>
<td><?= $produit['idP'] ?></td>					
<td><?= $produit['nomP'] ?></td>
<td><?= $produit['categorie'] ?></td>
<td><?= $produit['prixP'] ?> TND</td>
<td><?= $produit['qte'] ?></td>
<td><?= $produit['dateA'] ?></td>
<td><input type="checkbox" name="choix" value="<?= $produit['idP'] ?>"></td>
</td>
</tr>
				<?php 
					}
				?>	
</table>
    </div>
</section>
<?php
      }
      ?>
      <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Ajout des packs </h4>
                            </div>
                            <div class="row">
 <form action="" method="post">
        <table border="1" width="40%">
         <tr>

<td>
  <label for="nompc">Nom:
    </label>
</td>
<td><input type="text" name="nompc" id="nompc" ></td>
<tr>
<td>
  <label for="imagepk">Image:
    </label>
    <td><input type="file" name="imagepk" id="imagepk" ></td>
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
    <td><input type="number" name="prixpc" id="prixpc" ></td>
</td>
</tr>
<tr>
<td>
  <label for="qte">Quantité:
    </label>
    <td><input type="number" name="qte" id="qte" ></td>
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
        <br><br>
        <input type="submit" name="submitPC" value="Ajouter">
      </form>
                <div class="card-body"></div>
                        </div>
                    </div><!-- /# column -->
                </div>
      
       </div>
  </div>
</body>
</html>