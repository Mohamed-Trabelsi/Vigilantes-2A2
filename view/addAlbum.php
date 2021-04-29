<?php
    require_once '../controller/albumC.php';
    require_once '../entities/hotel.php';

    $albumC =  new albumC();

    if (isset($_POST['name']) && isset($_POST['prix']) && isset($_POST['image'])  && isset($_POST['adresse'])  && isset($_POST['caracteristiques'])  && isset($_POST['chambre'])) {
        $hotel = new hotel($_POST['name'], (float)$_POST['prix'], $_POST['image'], $_POST['adresse'],$_POST['caracteristiques'], $_POST['chambre']);
        
        $albumC->addHotel($hotel);

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
		<h2>New HOTEL</h2>
        <a href = "showAlbums.php" class="btn btn-primary shop-item-button">All albums</a>
		<div class="form-container">
            <form action="" method = "POST">
                <div class="row">
                    <div class="col-25">                
                        <label>Name: </label>
                    </div>
                    <div class="col-75">
                        <input type="text" name = "name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Price</label>
                    </div>
                    <div class="col-75">
                        <input type="number" name = "prix">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Adresse</label>
                    </div>
                    <div class="col-75">
                        <input type = "adresse" name = "adresse" >
                    </div>
                    <div class="col-25">
                        <label>chambres disponibles</label>
                    </div>
                    <div class="col-75">
                        <input type = "number" name = "chambre" >
                    </div>
                    <div class="col-25">
                        <label>caracteristisue</label>
                    </div>
                    <div class="col-75">
                        <input type = "text" name = "caracteristiques" >
                    </div>
                    <div class="col-25">
                        <label>Image</label>
                    </div>
                    <div class="col-75">
                        <input type = "file" name = "image" >
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