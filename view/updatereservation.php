<?php
    require_once '../controller/reservationR.php';
    require_once '../assets/reservation.php';

    $reservationR =  new reservationR();

    if (isset($_POST['dateR']) && isset($_POST['check_in']) && isset($_POST['check_out'])  && isset($_POST['paiement'])  && isset($_POST['hotel'])  && isset($_POST['client'])) {
        $reservation = new reservation($_POST['dateR'], $_POST['check_in'], $_POST['check_out'], (float)$_POST['paiement'],$_POST['hotel'], $_POST['client']);
        echo "helloooooooo";
        $reservationR->updateReservation($reservation,$_GET['id']);
    }
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="wnumth=device-wnumth, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>

    <a href = "searchreservation.php" class="btn btn-primary shop-item-button">Search</a>
    <?php
        if (isset($_GET['id'])) {
            $result = $reservationR->getReservationBynum($_GET['id']);
			if ($result !== false) {
    ?>
	<section class="container">
		<h2>Update reservation</h2>
        <a href = "showreservation.php" class="btn btn-primary shop-item-button">All reservation</a>
		<div class="form-container">
            <form action="" method = "POST">
                <div class="row">
                    <div class="col-25">                
                        <label>date reservation: </label>
                    </div>
                    <div class="col-75">
                        <input type="date" name = "dateR" value = "<?= $result['dateR'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>check_in</label>
                    </div>
                    <div class="col-75">
                        <input type="date" name = "check_in" value = "<?= $result['check_in'] ?>">
                    </div>
                    <div class="row">
                    <div class="col-25">
                        <label>check_out</label>
                    </div>
                    <div class="col-75">
                        <input type="date" name = "check_out" value = "<?= $result['check_out'] ?>">
                    </div>
                    <div class="row">
                    <div class="col-25">
                        <label>paiement</label>
                    </div>
                    <div class="col-75">
                        <input type="number" name = "paiement" value = "<?= $result['paiement'] ?>">
                    </div>
                    <div class="row">
                    <div class="col-25">
                        <label>hotel</label>
                    </div>
                    <div class="col-75">
                        <input type="number" name = "hotel" value = "<?= $result['hotel'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>client</label>
                    </div>
                    <div class="col-75">
                        <input type = "number" name = "client" value = "<?= $result['client'] ?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <input type="submit" value="Submit" name = "submit">
                </div>
                   <a href = "mail.php" class="btn btn-primary shop-item-button">send mail</a>
            </form>
		</div>
	</section>

    <?php
        }
    }
        else {
            header('Location:showreservation.php');
        }
    
    ?>
	
</body>

</html>