<?php

    require_once '../controller/EvenementC.php';

    $EvenementC =  new EvenementC();

	$evenements = $EvenementC->afficherEvenement();

	if (isset($_GET['id'])) {
		$EvenementC->deleteEvenement($_GET['id']);
		header('Location:AfficherEvenement.php');
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




	<a href = "AjouterEvenement.php" class="btn btn-primary shop-item-button" href = "#">Ajouter</a>
	<a href = "RechercherEvenement.php" class="btn btn-primary shop-item-button">Rechercher</a>
		<section class="container">
			<h2>Evenements</h2>
		
			<div class="shop-items">
				<?php
				$c=1;
					foreach ($evenements as $evenement) {
						
						echo  '<div class="panel"><table border class="table table-striped title1">
<tr><td><b>N.</b></td><td><b>ID</b></td><td><b>ID_Group</b></td><td><b>Nom</b></td><td><b>Adresse</b></td><td><b>Date Debut</b></td><td><b>Date Fin</b></td><td><b>Nombre de Participants</b></td><td><b>Image</b></td></tr>';

echo '<tr><td>'.$c++.'</td><td>'.$evenement['id'].'</td><td> '.$evenement['id_group'].'</td><td>'.$evenement['nom'].'</td><td>'.$evenement['adresse'].'</td><td>'.$evenement['dateD'].'</td><td> '.$evenement['dateF'].'</td><td> '.$evenement['nb_participant'].'</td><td> '.$evenement['image'].'</td><tr/>';


?>
<div class="shop-item-details">
						<a type="button" class="btn btn-primary shop-item-button" href = "ModifierEvenement.php?id=<?= $evenement['id'] ?>">Modifier</a>
						<a type="button" class="btn btn-primary shop-item-button" href = "AfficherEvenement.php?id=<?= $evenement['id'] ?>">Supprimer</a>
<?php 
					}
				?>

			</div>
		</section>





	<script src="../assets/js/script.js"></script>


</body>

</html>