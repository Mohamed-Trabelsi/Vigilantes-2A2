<?php
    require_once '../controller/albumC.php';
    require_once '../entities/hotel.php';

    $albumC =  new albumC();

    if (isset($_POST['name']) && isset($_POST['prix']) && isset($_POST['image'])  && isset($_POST['adresse'])  && isset($_POST['caracteristiques'])  && isset($_POST['chambre'])) {
        $hotel = new hotel($_POST['name'], (float)$_POST['prix'], $_POST['image'], $_POST['adresse'],$_POST['caracteristiques'], $_POST['chambre']);
        
        $albumC->updateHotel($hotel,$_GET['id']);
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
    <?php
        if (isset($_GET['id'])) {
            $result = $albumC->getAlbumById($_GET['id']);
			if ($result !== false) {
    ?>
	<section class="container">
		<h2>Update hotel</h2>
        <a href = "showAlbums.php" class="btn btn-primary shop-item-button">All albums</a>
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
            header('Location:showAlbums.php');
        }
    
    ?>
	
</body>

</html>