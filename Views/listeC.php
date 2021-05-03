<?php
    require_once '../Controller/categorie.php';

    $categorieG =  new gererCategorie();

	$categories = $categorieG->afficherCategorie();

		//header('Location:listeC.php');
	if (isset($_GET['idC'])) 
	{
		$categorieG->deleteCategorie($_GET['idC']);
		header('Location:listeC.php');
	}
////
?>
<!DOCTYPE html>
<html>
<head>
	<title>Liste des catégories</title>
	 <?php include_once 'header.php'; ?>
</head>
<body>
	 <?php include_once 'nav-bar.php'; ?>
		<div id="right-panel" class="right-panel">
      <div class="content">
			<h2>Liste des catégorie</h2>
			<br><br>
			<table class="table">
	<thead>
	<tr>
		<th>ID</th>
		<th>Nom</th>
		<th>Date d'ajout</th>
	</tr>
	</thead>
	<?php
					foreach ($categories as $categorie) {
				?>
				<tr>
<td><?= $categorie['idC'] ?></td>					
<td><?= $categorie['nomC'] ?></td>
<td><?= $categorie['dateC'] ?></td>
<td><a type="button" class="btn btn-info" href = "updateCategory.php?idC=<?= $categorie['idC'] ?>">Modifier</a>
						<a type="button" class="btn btn-danger" href = "listeC.php?idC=<?= $categorie['idC'] ?>">Supprimer</a>
</td>
				</tr>
				<?php 
					}
				?>	
</table>

</div>
</div>
</body>
</html>