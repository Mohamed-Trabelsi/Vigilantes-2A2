<?php
    require_once '../controller/GroupC.php';

    $GroupC =  new GroupC();

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../assets/css/style.css">
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
                        <label>Rechercher le nom: </label>
                    </div>
                    <div class="col-75">
                        <input type = "text" name = 'group'>
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
		if (isset($_POST['group']) && isset($_POST['search'])){
			$result = $GroupC->getGroupByNom($_POST['group']);
			if ($result !== false) {
	?>

		<section class="container">
			<h2 >Groups Volontaire</h2>
			
			<a href = "AfficherGroup.php" class="btn btn-primary shop-item-button">Tous les groups</a>
			<div class="shop-items">
				<a  href="index.php">
				<div class="shop-item"> 
					<strong class="shop-item-title"> <?= $result['nom'] ?> </strong> </a>
					<a  href="index.php">
					 <img src="../images/<?= $result['image'] ?>" class="shop-item-image"> </a>
					<div class="shop-item-details">
						<table><tr>numero: <?= $result['num'] ?></span></tr>
						<br>
						<tr>email: <?= $result['contact'] ?></span></tr></table>
					</div>
				</div>
				
			</div>
		</section>
		<?php include_once 'footer.php'; ?>

	<script src="../assets/js/script.js"></script>
	<?php
		}
		else {
			echo "<div> No results found!!! </div>";
		}
	}
	?>

</body>

</html>