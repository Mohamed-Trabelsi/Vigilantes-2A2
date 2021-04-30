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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<body>
	
	<a href = "searchAlbum.php" class="btn btn-primary shop-item-button">Search</a>
	
			<h2>HOTEL</h2>
			  

			  <div class="panel"><div class="table-responsive"><table class="table table-striped title1">
						<tr><td><b>S.N.</b></td><td><b>nom</b></td><td><b>Adresse</b></td><td><b>chambres disponibles</b></td><td><b>prix</b></td><td><b>By</b></td>

						<b><td><a href = "addAlbum.php" class="btn btn-primary shop-item-button" href = "#">Ajouter</a></td>
						   <td></td></tr>















			
		
			
				<?php
					foreach ($albums as $hotel) {
				?>
				
<tr>
	<td><strong class="shop-item-title"> <?= $hotel['name'] ?> </strong></td>
	<td><span class="shop-item-price"><?= $hotel['prix'] ?> dt.</span></td>
	<td><span class="shop-item-adresse"><?= $hotel['adresse'] ?></span></td>
	<td><span class="shop-item-caracteristiques"><?= $hotel['caracteristiques'] ?></span></td>
	<td><span class="shop-item-chambre"><?= $hotel['chambre'] ?></span></td>
	<td><img src="../images/<?= $hotel['image'] ?>" width = "200" height = "200" class="shop-item-image">
</td>
	<td>
						<a type="button" class="btn btn-primary shop-item-button" href = "updateAlbum.php?id=<?= $hotel['id'] ?>">Modifier</a></td>
	<td><a type="button" class="btn btn-primary shop-item-button" href = "showAlbums.php?id=<?= $hotel['id'] ?>">Supprimer</a></td>
</tr>
					
					
					
				
					
					
					
						
						
					
				
				<?php 
					}
				?>
		
	

	


</body>

</html>