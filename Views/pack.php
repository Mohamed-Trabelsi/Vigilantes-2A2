<?php
    require_once '../Controller/produit.php';
    require_once '../Controller/pack.php';
    require_once '../Models/pack.php';
     $produitG =  new gererProduit();

	   $produits = $produitG->afficherProduit();

 $gererPack = new gererPack();

  if (isset($_POST['choix']) && (isset($_POST['nompc'])&&($_POST['nompc']!="")) && isset($_POST['imagepk']) && isset($_POST['descriptionpc']) && isset($_POST['prixpc']) && isset($_POST['qte']) && isset($_POST['dateD']) && isset($_POST['dateF'])) {
  	    /*$id = $_POST['choix'];
        $chk="";
     foreach ($is as $chk1 ) 
      {
       $chk.=$chk1;
      }*/

        $pack = new pack($_POST['nompc'], $_POST['choix'], $_POST['descriptionpc'], $_POST['prixpc'], $_POST['imagepk'], $_POST['dateD'],$_POST['dateF'],$_POST['qte']);
        $gererPack->ajouterPack($pack);
        echo('record added');
        header('Location:pack.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Créer un pack</title>
	 <?php include_once 'header.php'; ?>
</head>
<body>
	<?php include_once 'nav-bar.php'; ?>
	<div id="right-panel" class="right-panel">
      <div class="content">
      	<br><br>
      	<table class="table">
	<thead>
	<tr>
		<th>ID</th>
		<th>Nom</th>
		<th>Prix</th>
		<th>Quantité</th>
		<th>Date d'ajout</th>
		<th>Ajouter au pack</th>
	</tr>
	</thead>
	<?php
					foreach ($produits as $produit) {
				?>
				<tr>
<td><?= $produit['idP'] ?></td>					
<td><?= $produit['nomP'] ?></td>
<td><?= $produit['prixP'] ?> TND</td>
<td><?= $produit['qte'] ?></td>
<td><?= $produit['dateA'] ?></td>
<form action="" method="post">
<td><input type="checkbox" name="choix" value="<?= $produit['idP'] ?>"></td>
</td>
				</tr>
				<?php 
					}
				?>	
</table>
 <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Ajout des packs </h4>
                            </div>
                            <div class="row">
 
        <table border="1" width="40%">
         <tr>

<td>
  <label for="nompc">Nom:
    </label>
</td>
<td><input type="text" name="nompc" id="nompc" ></td>
<tr>
<td>
  <label for="imagepk">Image:
    </label>
    <td><input type="file" name="imagepk" id="imagepk" ></td>
</td>
</tr>
<tr>
  <tr>
<td>
  <label for="descriptionpc">Description:
    </label>
    </td>
    <td>
    <textarea name="descriptionpc" id="descriptionpc" clos="30" rows="5"></textarea>
</td>
</tr>
<tr>
<td>
  <label for="prixpc">Prix:
    </label>
    <td><input type="number" name="prixpc" id="prixpc" ></td>
</td>
</tr>
<tr>
<td>
  <label for="qte">Quantité:
    </label>
    <td><input type="number" name="qte" id="qte" ></td>
</td>
</tr>
<tr>
<td>
  <label for="dateD">Date début:
    </label>
  </td>
    <td><input type="date" name="dateD" id="dateD" ></td>
</tr>
<tr>
<td>
  <label for="dateF">Date fin:
    </label>
  </td>
    <td><input type="date" name="dateF" id="dateF" ></td>
</tr>



        </table>
        <br><br>
        <input type="submit" name="submitPC" value="Ajouter">
      </form>
                <div class="card-body"></div>
                        </div>
                    </div><!-- /# column -->
                </div>
      </div>
  </div>
</body>
</html>