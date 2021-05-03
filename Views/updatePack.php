<?php
    require_once '../Controller/pack.php';
    require_once '../entities/pack.php';

    $packG =  new gererPack();
  
    if ( (isset($_POST['nompc'])&&($_POST['nompc']!="")) && isset($_POST['imagepk']) && isset($_POST['descriptionpc']) && isset($_POST['prixpc']) && isset($_POST['qte']) && isset($_POST['dateD']) && isset($_POST['dateF'])) 
    {
        $pack = new pack($_POST['nompc'], $_POST['choix'], $_POST['descriptionpc'], $_POST['prixpc'], $_POST['imagepk'], $_POST['dateD'],$_POST['dateF'],$_POST['qte']);
        
        $packG->updatePack($pack,$_GET['idPk']);
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
        if (isset($_GET['idPk'])) {
            $result = $packG->getPackById($_GET['idPk']);
            if ($result !== false) {
    ?>
    <section class="container">
        <h2>Update Pack</h2>
        <div class="form-container">
            <form action="" method = "POST">
                <div class="row">
                    <div class="col-25">                
                        <label>Nom: </label>
                    </div>
                    <div class="col-75">
                        <input type="text" name = "nompc" value = "<?= $result['nompk'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">                
                        <label>Categorie: </label>
                    </div>
                    <div class="col-75">
                        <input type="file" name = "imagepk" value = "<?= $result['img'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">                
                        <label>Description: </label>
                    </div>
                    <div class="col-75">
                        <input type="text" name = "descriptionpc" value = "<?= $result['description'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">                
                        <label>Prix: </label>
                    </div>
                    <div class="col-75">
                        <input type="number" name = "prixpc" value = "<?= $result['prix'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">                
                        <label>Quantité: </label>
                    </div>
                    <div class="col-75">
                        <input type="number" name = "qte" value = "<?= $result['quantite'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Date d'ajout</label>
                    </div>
                    <div class="col-75">
                        <input type="date" name = "dateD" value = "<?= $result['dateD'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label>Date fin</label>
                    </div>
                    <div class="col-75">
                        <input type="date" name = "dateF" value = "<?= $result['dateF'] ?>">
                        
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
            header('Location:packlist.php');
        }
    
    ?>
    
</body>

</html>
