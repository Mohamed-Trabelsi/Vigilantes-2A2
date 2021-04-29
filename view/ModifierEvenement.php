<?php
    require_once '../controller/EvenementC.php';
    require_once '../model/evenement.php';

   $EvenementC =  new EvenementC();

 if (isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['dateD']) && isset($_POST['dateF']) && isset($_POST['nb_participant']) && isset($_POST['image']) && isset($_POST['id_group']) ) {
        $evenement = new evenement($_POST['nom'], $_POST['adresse'], $_POST['dateD'], $_POST['dateF'], $_POST['nb_participant'], $_POST['image'], $_POST['id_group']);
        
        $EvenementC->updateEvenement($evenement,$_GET['id']);

        header('Location:AfficherEvenement.php');
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

    <a href = "RechercherEvenement.php" class="btn btn-primary shop-item-button">Rechercher</a>
    <?php
        if (isset($_GET['id'])) {
            $result = $EvenementC->getEvenementById($_GET['id']);

			if ($result !== false) {
    ?>
	<section class="container">
		<h2>Modifier Evenement</h2>
        <a href = "AfficherGroup.php" class="btn btn-primary shop-item-button">Tous les evenements</a>
		<div class="form-container">
            <form action="" method = "POST">


<?php  $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT id, nom FROM groups '
                );
$query->execute();
$data = $query->fetchAll();
?>
<label> Nom du group: </label>
<select  name="id_group" value = "<?= $result['id_group'] ?>">
<?php foreach ($data as $row): ?>
    <option value=<?=$row["id"]?> > <?=$row["nom"]?> </option>
<?php endforeach ?>
</select>


                <div class="row">
                    <div class="col-25">                
                        <label>Nom: </label>
                    </div>
                    <div class="col-75">
                        <input type="text" name = "nom" value = "<?= $result['nom'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>adresse:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name = "adresse" value = "<?= $result['adresse'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>dateD:</label>
                    </div>
                    <div class="col-75">
                        <input type="datetime-local" name = "dateD" value = "<?= $result['dateD'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>dateF:</label>
                    </div>
                    <div class="col-75">
                        <input type = "datetime-local" name = "dateF" value = "<?= $result['dateF'] ?>">
                    </div>
                </div>
                  <div class="row">
                    <div class="col-25">
                        <label>nombre de participants:</label>
                    </div>
                    <div class="col-75">
                        <input type = "number" name = "nb_participant" value = "<?= $result['nb_participant'] ?>" >
                    </div>
                </div>
                  <div class="row">
                    <div class="col-25">
                        <label>image:</label>
                    </div>
                    <div class="col-75">
                        <input type = "file" name = "image" value = "<?= $result['image'] ?>" >
                    </div>
                </div>
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
            header('Location:AfficherEvenement.php');
        }
    
    ?>
	
</body>

</html>