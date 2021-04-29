<?php
    require_once '../controller/albumC.php';

    $produitC =  new produitC();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>


	<section class="container">
		<h2></h2>
		<div class="form-container">
            <form action="" method = 'POST'>
                <div class="row">
                    <div class="col-25">                
                        <label>chercher produit: </label>
                    </div>
                    <div class="col-75">
                        <input type = "text" name = 'album'>
                    </div>
                </div>
                <br>
                <div class="row">
                    <input type = "submit" value = "Search" name ="search">
                </div>
            </form>
		</div>
	</section>

	<?php
		if (isset($_POST['produit']) && isset($_POST['search'])){
			$result = $produitC->getproduitBynomP($_POST['produit']);
			if ($result !== false) {
	?>
		<section class="container">
			<h2>PRODUIT</h2>
			<a href = "showAlbums.php" class="btn btn-primary shop-item-button">tous les produits</a>
			<div class="shop-items">
				
				<div class="shop-item">
					<strong class="shop-item-title"> <?= $result['titre'] ?> </strong>
					<img src="../images/<?= $result['image'] ?>" class="shop-item-image">
					<div class="shop-item-details">
						<span class="shop-item-price"><?= $result['prix'] ?> dt.</span>
					</div>
				</div>
				
			</div>
		</section>
	<?php
		}
		else {
			echo "<div> No results found!!! </div>";
		}
	}
	?>

</body>

</html>