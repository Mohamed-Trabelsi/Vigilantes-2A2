
<?php
    require_once '../controller/reservationR.php';
    require_once '../assets/reservation.php';
    require_once '../controller/hotelC.php';
session_start();
  $test =5 ;

    $reservationR =  new reservationR();
    $hotelC =  new hotelC();
     if (isset($_GET['id'])) {
            $result = $hotelC->getAlbumById($_GET['id']);}

    if (isset($_POST['date']) && isset($_POST['check_in']) && isset($_POST['check_out'])) {
           $test= 1;
            $calc_days = abs(strtotime( $_POST['check_out']) - strtotime($_POST['check_in'])) ; 
            $calc_days =floor($calc_days / (60*60*24)  );
          $p= $result['prix'] *  $calc_days ;
          $check_in = $_POST['check_in'];
          $check_out= $_POST['check_out'];
           $date= $_POST['date'];}

            
if (isset($_POST['test3']) && isset($_POST['date1'])  ) {
   
  
    $reservation = new reservation($_POST['date1'], $_POST['check_in1'], $_POST['check_out1'], $_POST['paiement1'],$_GET['id'], $_SESSION['a']);

       
        $reservationR->addReservation($reservation);
        header('Location:showhotel.php');
       ?> <?php
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
	<?php if ($test != 1 ) { ?>
       
    
    
    
	<section class="container">
		<h2>New resrevation</h2>
       
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
	<?php 
} 
     ?>







     <?php if ($test == 1 ) { ?>
       
    
   
    
    <section class="container">
        <h2>New resrevation</h2>
       
        <div class="form-container">
            <div class="form-container">
                <form action="" method = "POST">
               <div class="row">
                    <div class="col-25">                
                        <label>date: </label>
                    </div>
                    <div class="col-75">
                        <input type="date" name = "date1" value="<?=$date?>" readonly required autofocus>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>check_in</label>
                    </div>
                    <div class="col-75">
                        <input type="date" name = "check_in1" value="<?=$check_in?>" readonly required autofocus>
                    </div>
                </div>
                 <div class="col-25">
                        <label>check_out</label>
                    </div>
                    <div class="col-75">
                        <input type = "date" name = "check_out1" value="<?=$check_out?>" readonly required autofocus>
                    </div>
                <div class="row">
                    <div class="col-25">
                        <label>paiement: </label>
                    </div>
                    <div class="col-75">
                        <input type="real" name = "paiement1" value="<?= $p?>" readonly required autofocus>
                    </div>
                    <div class="col-25">
                        <label>clients: <?=$_SESSION['b'] ?></label>
                    </div>
                   
                    <div class="col-25">
                        <label name= "hotel">hotel: <?= $result['name']?></label>
                    </div>
                   
                   
                </div>
                <br>
                <div class="row">
                    <input type="submit" value="Submit" name = "test3">
                </div>
            </form>
        </div>
    </section>
    <?php 
} 
     ?>
</body>

</html>
 