<?php
    require_once '../controller/produit.php';
    require_once '../controller/pack.php';
    $packG =  new gererPack();

	$packs = $packG->afficherPack();

		//header('Location:listeC.php');
	if (isset($_GET['idPk'])) 
	{
		$packG->deletePack($_GET['idPk']);
		header('Location:packlist.php');
	}
////
?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste des Packs</title>
	 <?php include_once 'headerd.php'; ?>
</head>
<body>
	<?php include_once 'nav-bar.php'; ?>
		<div id="right-panel" class="right-panel">
      <div class="content">
		<section class="container">
			<h2>Liste des packs</h2>
			<br><br>
			<div class="shop-items">
				<?php
					foreach ($packs as $pack) {
				?>
				<div class="shop-item">
					<div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title"><strong><?= $pack['nompk'] ?> </strong> </h4>
                            </div>
                            <div class="row">
					<div class="shop-item-details">
						<img src="../assets/img/<?= $pack['img'] ?>"  height="200 "width="200">
						<span class="shop-item-des"><?= $pack['description'] ?>  </span>
						<br><br>
						<span class="shop-item-price">Prix: <?= $pack['prix'] ?> TND </span>
						<br><br>
						<span class="shop-item-date"> Quantité: <?= $pack['quantite'] ?>  </span>
						<br><br>
						<span class="shop-item-date"> Date début: <?= $pack['dateD'] ?>  </span>
						<br><br>
						<span class="shop-item-date"> Date fin: <?= $pack['dateF'] ?>  </span>
						<br><br>
						<a type="button" class="btn btn-info" href = "updatePack.php?idPk=<?= $pack['idPk'] ?>">Modifier</a>
						<a type="button" class="btn btn-danger" href = "packlist.php?idPk=<?= $pack['idPk'] ?>">Supprimer</a>
</div> <!-- /.row -->
                            <div class="card-body"></div>
                        </div>
                    </div><!-- /# column -->
                </div>
					</div>
				</div>
				<br><br>
				<?php 
					}
				?>
			</div>
		</section>
</div>
</div>
</body>

</html>