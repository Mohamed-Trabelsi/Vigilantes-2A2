<?php
    require_once '../controller/albumC.php';
    require_once '../entities/album.php';

    $produitC =  new produitC();

    if (isset($_POST['nomP']) && isset($_POST['prix']) && isset($_POST['image'])) {
        $produit = new produit($_POST['nomP'], (float)$_POST['prix'], $_POST['image']);
        
        $produitC->updateproduit($produit,$_GET['idP']);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

    <a href = "searchAlbum.php" class="btn btn-primary shop-item-button">recherche</a>
    <?php
        if (isset($_GET['idP'])) {
            $result = $produitC->getproduitById($_GET['idP']);
			if ($result !== false) {
    ?>
	<section class="container">
		<h2>modifier produit</h2>
        <a href = "showAlbums.php" class="btn btn-primary shop-item-button">tous les produit</a>
		<div class="form-container">
            <form action="" method = "POST">
                <div class="row">
                    <div class="col-25">                
                        <label>nom de produit: </label>
                    </div>
                    <div class="col-75">
                        <input type="text" name = "titre" value = "<?= $result['nomP'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Prix</label>
                    </div>
                    <div class="col-75">
                        <input type="number" name = "prix" value = "<?= $result['prix'] ?>">
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