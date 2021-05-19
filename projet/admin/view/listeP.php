<?php
    require_once '../controller/produit.php';

    $produitG =  new gererProduit();

	$produits = $produitG->afficherProduit();

		//header('Location:listeC.php');
	if (isset($_GET['idP'])) 
	{
		$produitG->deleteProduit($_GET['idP']);
		header('Location:listeP.php');
	}
////
?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste des Produits</title>
	 <?php include_once 'headerd.php'; ?>
	 <div id="fb-root"></div>
<div id="fb-root"></div>

</head>


<body>
	<?php include_once 'nav-bar.php'; ?>
		<div id="right-panel" class="right-panel">
      <div class="content">
		<section class="container">
			<h2>Liste des Produits</h2>
			<br><br>
			<a href="pdfC.php">pdf</a>
			<br><br>
			<a href="excel.php">excel</a>
			<br><br>
			<div class="shop-items">
				<?php
					foreach ($produits as $produit) {
				?>
				<div class="shop-item">
					<div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title"><strong><?= $produit['nomP'] ?> </strong> </h4>
                            </div>
                            <div class="row">
					<div class="shop-item-details">
						<img src="../assets/img/<?= $produit['imageP'] ?>"  height="200 "width="200">
						<span class="shop-item-des"><?= $produit['descriptionP'] ?>  </span>
						<br><br>
						<span class="shop-item-price">Prix: <?= $produit['prixP'] ?> TND </span>
						<br><br>
						<span class="shop-item-date"> Date d'ajout: <?= $produit['dateA'] ?>  </span>
						<br><br>
						<span class="shop-item-date"> Quantité: <?= $produit['qte'] ?>  </span>
						<br><br>
						<a type="button" class="btn btn-info" href = "updateProduit.php?idP=<?= $produit['idP'] ?>">Modifier</a>
						<a type="button" class="btn btn-danger" href = "listeP.php?idP=<?= $produit['idP'] ?>">Supprimer</a>
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