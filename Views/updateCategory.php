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
	<?php include_once 'header.php'; ?>
</head>

<body>
    <?php include_once 'nav-bar.php'; ?>
 <div id="right-panel" class="right-panel">
      <div class="content">
    <?php
        if (isset($_GET['idC'])) {
            $result = $categorieG->getCategorieById($_GET['idC']);
			if ($result !== false) {
    ?>
	<section class="container">
        <br><br>
        <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Modifier</h4>
                            </div>
                            <div class="row">
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
         </div> <!-- /.row -->
                            <div class="card-body"></div>
                        </div>
                    </div><!-- /# column -->
                </div>
	</section>

    <?php
        }
    }
        else {
            header('Location:listeC.php');
        }
    
    ?>
	</div>
</div>
</body>

</html>