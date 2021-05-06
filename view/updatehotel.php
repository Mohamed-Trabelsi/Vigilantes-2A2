<?php
    require_once '../controller/hotelC.php';
    require_once '../assets/hotel.php';

    $hotelC =  new hotelC();

    if (isset($_POST['name']) && isset($_POST['prix']) && isset($_POST['image'])  && isset($_POST['adresse'])  && isset($_POST['caracteristiques'])  && isset($_POST['chambre'])) {
        $hotel = new hotel($_POST['name'], (float)$_POST['prix'], $_POST['image'], $_POST['adresse'],$_POST['caracteristiques'], $_POST['chambre']);
        
        $hotelC->updateHotel($hotel,$_GET['id']);
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
    <?php
        if (isset($_GET['id'])) {
            $result = $hotelC->getAlbumById($_GET['id']);
			if ($result !== false) {
    ?>
	<section class="container">
		<h2>Update hotel</h2>
        <a href = "showhotel.php" class="btn btn-primary shop-item-button">All hotel</a>
		<div class="form-container">
            <form action="" method = "POST">
                <div class="row">
                    <div class="col-25">                
                        <label>Title: </label>
                    </div>
                    <div class="col-75">
                        <input type="text" name = "name" value = "<?= $result['name'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Price</label>
                    </div>
                    <div class="col-75">
                        <input type="number" name = "prix" value = "<?= $result['prix'] ?>">
                    </div>
                    <div class="row">
                    <div class="col-25">
                        <label>adresse</label>
                    </div>
                    <div class="col-75">
                        <input type="adresse" name = "adresse" value = "<?= $result['adresse'] ?>">
                    </div>
                    <div class="row">
                    <div class="col-25">
                        <label>chambre dispo</label>
                    </div>
                    <div class="col-75">
                        <input type="number" name = "chambre" value = "<?= $result['chambre'] ?>">
                    </div>
                    <div class="row">
                    <div class="col-25">
                        <label>caracteristiques</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name = "caracteristiques" value = "<?= $result['caracteristiques'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Image</label>
                    </div>
                    <div class="col-75">
                        <input type = "file" name = "image" value = "<?= $result['image'] ?>">
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
    }
        else {
            header('Location:showhotel.php');
        }
    
    ?>
	
</body>

</html>