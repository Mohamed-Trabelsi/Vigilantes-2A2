<?php
    require_once '../controller/albumC.php';

    $albumC =  new albumC();

	$albums = $albumC->afficherHotel();

	if (isset($_GET['id'])) {
		$albumC->deleteHotel($_GET['id']);
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
	
	<a href = "searchAlbum.php" class="btn btn-primary shop-item-button">Search</a>
		<section class="container">
			<h2>HOTEL</h2>
			<a href = "addAlbum.php" class="btn btn-primary shop-item-button" href = "#">Ajouter</a>
			<div class="shop-items">
				<?php
					foreach ($albums as $hotel) {
				?>
				<div class="shop-item">
					<strong class="shop-item-title"> <?= $hotel['name'] ?> </strong>
					<span class="shop-item-price"><?= $hotel['prix'] ?> dt.</span>
					<span class="shop-item-adresse"><?= $hotel['adresse'] ?></span>
					<span class="shop-item-caracteristiques"><?= $hotel['caracteristiques'] ?></span>
					<span class="shop-item-chambre"><?= $hotel['chambre'] ?></span>
					<img src="../images/<?= $hotel['image'] ?>" width = "200" height = "200" class="shop-item-image">

					<div class="shop-item-details">
						
						<a type="button" class="btn btn-primary shop-item-button" href = "updateAlbum.php?id=<?= $hotel['id'] ?>">Modifier</a>
						<a type="button" class="btn btn-primary shop-item-button" href = "showAlbums.php?id=<?= $hotel['id'] ?>">Supprimer</a>
					</div>
				</div>
				<?php 
					}
				?>
			</div>
		</section>

	


</body>

</html>