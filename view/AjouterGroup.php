<?php
    require_once '../controller/GroupC.php';
    require_once '../model/group.php';
session_start();
include_once '../assets/compte.php';
include_once '../controller/compteU.php';
    $GroupC =  new GroupC();

    if (isset($_POST['nom']) && isset($_POST['num']) && isset($_POST['contact']) && isset($_POST['image']) && isset($_POST['description']) ) {
        $group = new group($_POST['nom'], $_POST['num'], $_POST['contact'], $_POST['image'], $_POST['description']);
        
        $GroupC->addGroup($group);

        header('Location:AfficherGroup.php');
    }
?>

<!DOCTYPE html>
<link rel="stylesheet" href="../assets/css/style.css">
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   
</head>
<?php include_once 'header.php'; ?>
<body>
	
    <a href = "RechercherGroup.php" class="btn btn-primary shop-item-button">Search</a>
	<section class="container">
		<h2>Ajouter group volontaire</h2>
        <a href = "AfficherGroup.php" class="btn btn-primary shop-item-button">tous les groups</a>
		<div class="form-container">
            <form action="" method = "POST">

              

                <div class="row">
                    <div class="col-25">                
                        <label>Nom: </label>
                    </div>
                    <div class="col-75">
                        <input type="text" name = "nom">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Num:</label>
                    </div>
                    <div class="col-75">
                        <input type="number" name = "num">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Email:</label>
                    </div>
                    <div class="col-75">
                        <input type="email" name = "contact">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Image:</label>
                    </div>
                    <div class="col-75">
                        <input type = "file" name = "image" >
                    </div>
                </div>
                <label>Description:</label>
                <br>
                  <textarea rows="10" cols="50" id="description" name="description" class="form-control" placeholder="Ajouter la description ici..."></textarea>  
                <br>
                <div class="row">
                    <input type="submit" value="Submit" name = "submit">
                </div>
            </form>
		</div>
	</section>
	<script src="../assets/js/script.js"></script>

</body>

</html>