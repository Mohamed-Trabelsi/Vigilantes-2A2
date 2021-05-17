<?php
    require_once '../Controller/produit.php';

    $produitG =  new gererProduit();

	$produits = $produitG->afficherProduit();

	

	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste des Produits</title>
	 <?php include_once 'headerfront.php'; ?>

	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	 <div id="fb-root"></div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v10.0" nonce="lzRpfdmx"></script>
<meta property="og:url"           content="http://listeP.php" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Produit" />
<meta property="og:description"   content="Your description" />
<meta property="og:image"         content="logo.png" />
</head>
<body>

	<section class="hero-wrap hero-wrap-2" style="background-image: url('../assets/img/bg_2.jpg');"
         data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Accueil<i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Boutique <i
                                class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">Boutique</h1>
            </div>
        </div>
    </div>
</section>
	 
		<div id="right-panel" class="right-panel">
      <div class="content">
		<section class="container">
			<h2>Liste des Produits</h2>
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
						
						<table>
							<tr>
								<td rowspan = "2">
						<img src="../assets/img/<?= $produit['imageP'] ?>"  height="200 "width="200">
					</td>
					<td>
						<span class="shop-item-des"><?= $produit['descriptionP'] ?>  </span>
						</td>
						
					</tr>
					<tr>
						<td>
						<span class="shop-item-price">Prix: <?= $produit['prixP'] ?> TND </span>
						</td>
					</tr>
						</table>
						<br><br>
						
							
						<div class="fb-share-button" data-href="http://listeP.php" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2FlisteP.php%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Partager</a></div>
					<br><br>
	
<a type="button" class="btn btn-info" href = "rate.php?idP=<?= $produit['idP'] ?>">Noter</a>			

					<br><br>
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