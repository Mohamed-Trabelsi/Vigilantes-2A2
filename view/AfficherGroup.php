<?php

    require_once '../controller/GroupC.php';

    $GroupC =  new GroupC();

	$groups = $GroupC->afficherGroup();

	if (isset($_GET['id'])) {
		$GroupC->deleteGroup($_GET['id']);
		header('Location:AfficherGroup.php');
	}

?>
<!DOCTYPE html>
<link rel="stylesheet" href="../assets/css/style.css">

<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	

</head>
<?php include_once 'header.php'; ?>
<body>
	<!--

	 <?php include_once 'header.php'; ?>
	<a href = "searchAlbum.php" class="btn btn-primary shop-item-button">Rechercher</a>
		<section class="container">
			<h2>Groups volontaires</h2>
			<a href = "addAlbum.php" class="btn btn-primary shop-item-button" href = "#">Ajouter</a>
			<div class="shop-items">
				<?php
					foreach ($groups as $group) {
				?>
				<div class="shop-item">
					<strong class="shop-item-title"> <?= $group['nom'] ?> </strong>
					<img src="../images/<?= $group['image'] ?>" width = "200" height = "200" class="shop-item-image">
					<div class="shop-item-details">
						<span class="shop-item-price"><?= $group['num'] ?>  </span>
						<a type="button" class="btn btn-primary shop-item-button" href = "updateAlbum.php?idGroup=<?= $group['id'] ?>">Modifier</a>
						<a type="button" class="btn btn-primary shop-item-button" href = "showAlbums.php?idGroup=<?= $group['id'] ?>">Supprimer</a>
					</div>
				</div>
				<?php 
					}
				?>
			</div>
		</section>
<?php include_once 'footer.php'; ?>
-->




	<a href = "AjouterGroup.php" class="btn btn-primary shop-item-button" href = "#">Ajouter</a>
	<a href = "RechercherGroup.php" class="btn btn-primary shop-item-button">Rechercher</a>
		<section class="container">
			<h2>Groups volontaires</h2>
		
			<div class="shop-items">
				<?php
				$c=1;
					foreach ($groups as $group) {
						
						echo  '<div class="panel"><table border class="table table-striped title1">
<tr><td><b>N.</b></td><td><b>ID</b></td><td><b>Nom</b></td><td><b>Mobile</b></td><td><b>Email</b></td><td><b>Description</b></td><td><b>Image</b></td></tr>';

echo '<tr><td>'.$c++.'</td><td>'.$group['id'].'</td><td>'.$group['nom'].'</td><td>'.$group['num'].'</td><td>'.$group['contact'].'</td><td> '.$group['description'].'</td><td> '.$group['image'].'</td><tr/>';


?>
<div class="shop-item-details">
						<a type="button" class="btn btn-primary shop-item-button" href = "ModifierGroup.php?id=<?= $group['id'] ?>">Modifier</a>
						<a type="button" class="btn btn-primary shop-item-button" href = "AfficherGroup.php?id=<?= $group['id'] ?>">Supprimer</a>
<?php 
					}
				?>

			</div>
		</section>





	<script src="../assets/js/script.js"></script>


</body>

</html>