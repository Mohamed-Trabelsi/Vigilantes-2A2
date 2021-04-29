<?php
    require_once '../controller/albumC.php';

    $produitC =  new produitC();

	$produit = $produitC->afficherproduit();

	if (isset($_GET['idP'])) {
		$produitC->deleteproduit($_GET['idP']);
		header('Location:showAlbums.php');
	}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	

</head>

<body>
	
	<a href = "searchAlbum.php" class="btn btn-primary shop-item-button">recherche</a>
		<section class="container">
			<h2>PRODUITS</h2>
			<a href = "addAlbum.php" class="btn btn-primary shop-item-button" href = "#">Ajouter</a>
			<div class="shop-items">
				<?php
					foreach ($produit as $produit) {
				?>
				<div class="shop-item">
					<strong class="shop-item-title"> <?= $produit['idP'] ?> </strong>
					<img src="../images/<?= $produit['image'] ?>" width = "200" height = "200" class="shop-item-image">
					<div class="shop-item-details">
						<span class="shop-item-price"><?= $produit['prix'] ?> dt.</span>
						<a type="button" class="btn btn-primary shop-item-button" href = "updateAlbum.php?idAlbum=<?= $produit['idP'] ?>">Modifier</a>
						<a type="button" class="btn btn-primary shop-item-button" href = "showAlbums.php?idAlbum=<?= $produit['idP'] ?>">Supprimer</a>
					</div>
				</div>
				<?php 
					}
				?>
			</div>
		</section>

	


</body>

</html>