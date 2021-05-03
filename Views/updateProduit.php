<?php
    require_once '../Controller/categorie.php';
    require_once '../entities/categorie.php';
    require_once '../Controller/produit.php';
    require_once '../entities/produit.php';
    
    $gererCategorie =  new gererCategorie();
    $categories = $gererCategorie -> afficherCategorie();
    $produitG =  new gererProduit();
  
    if (isset($_POST['nom']) && isset($_POST['idcategorie']) && isset($_POST['description']) && isset($_POST['prix']) && isset($_POST['img']) && isset($_POST['date']) && isset($_POST['qte'])) 
    {
        $produit = new produit($_POST['nom'],$_POST['idcategorie'],$_POST['description'],$_POST['prix'],$_POST['img'],$_POST['date'],$_POST['qte']);
        
        $produitG->updateProduit($produit,$_GET['idP']);
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

    
    <?php
        if (isset($_GET['idP'])) {
            $result = $produitG->getProduitById($_GET['idP']);
			if ($result !== false) {
    ?>
	<section class="container">
		<h2>Update Produit</h2>
        <a href = "listeC.php" class="btn btn-primary shop-item-button">Tout les produits</a>
		<div class="form-container">
            <form action="" method = "POST">
                <div class="row">
                    <div class="col-25">                
                        <label>Nom: </label>
                    </div>
                    <div class="col-75">
                        <input type="text" name = "nom" value = "<?= $result['nomP'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">                
                        <label>Categorie: </label>
                    </div>
                    <div class="col-75">
                        <select name="idcategorie" id="idcategorie">
          <?php
                      foreach ($categories as $categorie) {
          ?>
          <option value="<?=$categorie['idC'] ?>"
                         
selected

            >
            <?= $categorie['nomC'] ?>
            
          </option>
          <?php } ?>
          
        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">                
                        <label>Description: </label>
                    </div>
                    <div class="col-75">
                        <input type="text" name = "description" value = "<?= $result['descriptionP'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">                
                        <label>Prix: </label>
                    </div>
                    <div class="col-75">
                        <input type="number" name = "prix" value = "<?= $result['prixP'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">                
                        <label>image: </label>
                    </div>
                    <div class="col-75">
                        <input type="file" name = "img" value = "<?= $result['imageP'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Date d'ajout</label>
                    </div>
                    <div class="col-75">
                        <input type="date" name = "date" value = "<?= $result['dateA'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Quantité</label>
                    </div>
                    <div class="col-75">
                        <input type="number" name = "qte" value = "<?= $result['qte'] ?>">
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
            header('Location:listeP.php');
        }
    
    ?>
	
</body>

</html>