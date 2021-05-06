<?php
    require_once '../controller/reservationR.php';

    $reservationR =  new reservationR();

	$reservations = $reservationR->afficherReservation();
if (isset($_POST['Filter']))
	{ if($_POST['Filter']=="dateR")
		{$reservations = $reservationR->filtre_DateR();}
		elseif ($_POST['Filter']=="check_in") {
		 $reservations = $reservationR->filtreCheck_in();}
		 elseif ($_POST['Filter']=="check_out") {
		 $reservations = $reservationR->filtreCheck_out();}
		 elseif ($_POST['Filter']=="paiement") {
		 $reservations = $reservationR->filtrePaiement();
		 } 
	//$reservations = $reservationR->afficherFilter($_POST['Filter']);
	 }
	/*if (isset($_GET['id'])) {
		$reservationR->deleteHotel($_GET['id']);
		header('Location:showhotel.php');
	}*/

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<body>
	
	<a href = "searchhotel.php" class="btn btn-primary shop-item-button">Search</a>
	<section class="container">
			<h2>liste des réservations</h2>
			  <form action="" method = "POST">
					  	<select class="custom-select browser-default" name="Filter">
							  <option selected value="dateR">date reservation</option>
							  <option value="check_in">check_in</option>
							  <option value="check_out">check_out</option>
							  <option value="paiement">paiement</option>
		</select>
		<button class="btn btn-block btn-primary">trier</button>
			  <td><a type="button" class="btn btn-primary shop-item-button" href = "pdf.php">pdf</a></td>
			  </form>

			  <div class="panel"><div class="table-responsive"><table class="table table-striped title1">
						<tr><td><b>date reservation</b></td><td><b>check_in</b></td><td><b>check_out</b></td><td><b>paiement</b></td><td><b>hotel ID</b></td><td><b>client ID</b></td>


						   <td></td><td></td></tr>
				<?php
					foreach ($reservations as $reservation) {
				?>
				
<tr>
	<td><strong class="shop-item-title"> <?= $reservation['dateR'] ?> </strong></td>
	<td><span class="shop-item-price"><?= $reservation['check_in'] ?> dt.</span></td>
	<td><span class="shop-item-adresse"><?= $reservation['check_out'] ?></span></td>
	<td><span class="shop-item-caracteristiques"><?= $reservation['paiement'] ?></span></td>
	<td><span class="shop-item-chambre"><?= $reservation['hotel'] ?></span></td>
	<td><span class="shop-item-chambre"><?= $reservation['client'] ?></span></td>
	<td>
						<a type="button" class="btn btn-primary shop-item-button" href = "updatereservation.php?id=<?= $reservation['num'] ?>">Modifier</a></td>
	<td><a type="button" class="btn btn-primary shop-item-button" href = "showhotel.php?id=<?= $hotel['id'] ?>">Supprimer</a></td>
	
</tr>
				<?php 
					}
				?>
		
	

	

</section>

</body>

</html>