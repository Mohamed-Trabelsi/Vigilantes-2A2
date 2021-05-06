<?php
    require_once '../controller/reservationR.php';
    require_once '../assets/reservation.php';
    require_once '../controller/hotelC.php';
session_start();
    $reservationR =  new reservationR();
    $hotelC =  new hotelC();
     if (isset($_GET['id'])) {
            $result = $hotelC->getAlbumById($_GET['id']);}

    if (isset($_POST['date']) && isset($_POST['check_in']) && isset($_POST['check_out'])) {
            $calc_days = abs(strtotime( $_POST['check_out']) - strtotime($_POST['check_in'])) ; 
            $calc_days =floor($calc_days / (60*60*24)  );
            $p= $result['prix'] *  $calc_days ;
        echo $p ;
        echo  $calc_days ;
        $reservation = new reservation($_POST['date'], $_POST['check_in'], $_POST['check_out'], $p,$_GET['id'], $_SESSION['a']);
       
        $reservationR->addReservation($reservation);

       // header('Location:showhotel.php');
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
	
    <a href = "searchhotel.php" class="btn btn-primary shop-item-button">Search</a>
    
	<section class="container">
		<h2>New resrevation</h2>
        <a href = "showhotel.php" class="btn btn-primary shop-item-button">All hotel</a>
		<div class="form-container">
            <form action="" method = "POST">
                <div class="row">
                    <div class="col-25">                
                        <label>date: </label>
                    </div>
                    <div class="col-75">
                        <input type="date" name = "date">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>check_in</label>
                    </div>
                    <div class="col-75">
                        <input type="date" name = "check_in">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>paiement: <?= $p?></label>
                    </div>
                    
                    <div class="col-25">
                        <label>clients: <?=$_SESSION['b'] ?></label>
                    </div>
                   
                    <div class="col-25">
                        <label name= "hotel">hotel: <?= $_GET['id']?></label>
                    </div>
                   
                    <div class="col-25">
                        <label>check_out</label>
                    </div>
                    <div class="col-75">
                        <input type = "date" name = "check_out" >
                    </div>
                </div>
                <br>
                <div class="row">
                    <input type="submit" value="Submit" name = "submit">
                </div>
            </form>
		</div>
	</section>
	
</body>

</html>