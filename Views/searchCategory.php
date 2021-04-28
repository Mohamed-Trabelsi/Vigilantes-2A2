<?php
    require_once '../Controller/categorie.php';

    $categorieG =  new gererCategorie();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>


	<section class="container">
		
		<div class="form-container">
            <form action="" method = 'POST'>
                <div class="row">
                    <div class="col-25">                
                        <label>Search Name: </label>
                    </div>
                    <div class="col-75">
                        <input type = "text" name = 'categorie'>
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
		if (isset($_POST['categorie']) && isset($_POST['search'])){
			$result = $categorieG->getcategorieByNom($_POST['categorie']);
			if ($result !== false) {
	?>
		
		<?php include_once 'listeC.php'; ?>

	<?php
		}
		else {
			echo "<div> No results found!!! </div>";
		}
	}
	?>

</body>

</html>