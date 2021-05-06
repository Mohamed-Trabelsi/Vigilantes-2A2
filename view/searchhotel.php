<?php
    require_once '../controller/hotelC.php';

    $hotelC =  new hotelC();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>


	<section class="container">
		<h2></h2>
		<div class="form-container">
            <form action="" method = 'POST'>
                <div class="row">
                    <div class="col-25">                
                        <label>Search Name: </label>
                    </div>
                    <div class="col-75">
                        <input type = "text" name = 'name'>
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
		if (isset($_POST['name']) && isset($_POST['search'])){
			$result = $hotelC->getHotelByName($_POST['name']);
			if ($result !== false) {
	?>
		<section class="container">
			<h2>MUSIC</h2>
			<a href = "showhotel.php" class="btn btn-primary shop-item-button">All hotel</a>
			<div class="shop-items">
				
				<div class="shop-item">
					<strong class="shop-item-title"> <?= $result['name'] ?> </strong>
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