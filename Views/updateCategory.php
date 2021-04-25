<?php
    require_once '../Controller/categorie.php';
    require_once '../entities/categorie.php';

    $categorieG =  new gererCategorie();
  
    if (isset($_POST['nom']) && isset($_POST['date'])) 
    {
        $categorie = new categorie($_POST['nom'],$_POST['date']);
        
        $categorieG->updateCategorie($categorie,$_GET['idC']);
    }
    ////
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

    <!--<a href = "searchAlbum.php" class="btn btn-primary shop-item-button">Search</a>-->
    <?php
        if (isset($_GET['idC'])) {
            $result = $categorieG->getCategorieById($_GET['idC']);
			if ($result !== false) {
    ?>
	<section class="container">
		<h2>Update Categorie</h2>
        <a href = "listeC.php" class="btn btn-primary shop-item-button">All category</a>
		<div class="form-container">
            <form action="" method = "POST">
                <div class="row">
                    <div class="col-25">                
                        <label>Nom: </label>
                    </div>
                    <div class="col-75">
                        <input type="text" name = "nom" value = "<?= $result['nomC'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Date d'ajout</label>
                    </div>
                    <div class="col-75">
                        <input type="date" name = "date" value = "<?= $result['dateC'] ?>">
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
            header('Location:listeC.php');
        }
    
    ?>
	
</body>

</html>