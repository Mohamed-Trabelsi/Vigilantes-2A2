<?php
    require_once '../controller/albumC.php';
    require_once '../entities/album.php';

    $produitC =  new produitC();

    if (isset($_POST['nomP']) && isset($_POST['prix']) && isset($_POST['image'])) {
        $produit = new produit($_POST['nomP'], (float)$_POST['prix'], $_POST['image']);
        
        $produitC->addproduit($produit);

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
		<h2>Nouveau produit</h2>
        <a href = "showAlbums.php" class="btn btn-primary shop-item-button">tous les produits</a>
		<div class="form-container">
            <form action="" method = "POST">
                <div class="row">
                    <div class="col-25">                
                        <label>nom du produit: </label>
                    </div>
                    <div class="col-75">
                        <input type="text" name = "nomP">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Prix produit</label>
                    </div>
                    <div class="col-75">
                        <input type="number" name = "prix">
                    </div>
                </div>
                <div class="row">
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