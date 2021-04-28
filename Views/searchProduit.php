<?php
require_once '../Controller/categorie.php';
require_once '../entities/categorie.php';
require_once '../entities/produit.php';

$gererCategorie = new gererCategorie();
$categories = $gererCategorie -> afficherCategorie();
if (isset ($_POST['categorie']) && isset ($_POST['search']))
{
	$list = $gererCategorie->afficherProduit($_POST['categorie']);
}
?>
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
					<option value="<? $categorie['idC'] ?>"
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
	<h2>Produits</h2>
	<div class="shop-items">
		<?php
		
		foreach ($list as $produit) { 
	     ?>
	<div class="shop-item">
		<strong class="shop-item-title"><?= $produit['nomC']?></strong>
	</div>
	<?php
        }
        ?>
    </div>
</section>
<?php
      }
      ?>