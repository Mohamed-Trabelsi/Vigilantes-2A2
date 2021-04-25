<?php
    require_once '../Controller/categorie.php';

    $categorieG =  new gererCategorie();

	$categories = $categorieG->afficherCategorie();

		//header('Location:listeC.php');
	if (isset($_GET['idC'])) 
	{
		$categorieG->deleteCategorie($_GET['idC']);
		header('Location:listeC.php');
	}
////
?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste des catégories</title>
	 <!-- to make it looking good im using bootstrap -->
	 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<!--<body>
	<div class="container">

		<br><br>
		<h2>Les categories</h2>
		<br><br>
<table class="table">
	<thead>
		<tr>
		<th>ID</th>
		<th>Nom</th>
		<th>Date d'ajout</th>
	</tr>
	</thead>
</table>
</div>
</body>-->
<body>
		<section class="container">
			<h2>Animaux</h2>
			<a href = "shop.php" class="btn btn-primary shop-item-button" href = "#">Ajouter</a>
			<br><br>
			<div class="shop-items">
				<?php
					foreach ($categories as $categorie) {
				?>
				<div class="shop-item">
					<strong class="shop-item-title"> <?= $categorie['nomC'] ?> </strong>
					<div class="shop-item-details">
						<span class="shop-item-price"><?= $categorie['dateC'] ?>  </span>
						<a type="button" class="btn btn-primary shop-item-button" href = "updateCategory.php?idC=<?= $categorie['idC'] ?>">Modifier</a>
						<a type="button" class="btn btn-primary shop-item-button" href = "listeC.php?idC=<?= $categorie['idC'] ?>">Supprimer</a>
					</div>
				</div>
				<br><br>
				<?php 
					}
				?>
			</div>
		</section>

</body>
</html>