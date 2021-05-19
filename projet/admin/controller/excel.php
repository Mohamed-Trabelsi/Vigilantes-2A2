<?php
require_once '../Controller/produit.php';
$produitG =  new gererProduit();
$produits = $produitG->afficherProduit();
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=chillyfacts.com.xls");


?>
<br>
<table style="width:100%" border='1'>

<tr>
		<th>ID</th>
		<th>Nom</th>
		<th>Prix</th>
		<th>Quantité</th>
		<th>Date d'ajout</th>
</tr>
	
	<?php
					foreach ($produits as $produit) {
				?>
<tr>
<td><?= $produit['idP'] ?></td>					
<td><?= $produit['nomP'] ?></td>
<td><?= $produit['prixP'] ?> TND</td>
<td><?= $produit['qte'] ?></td>
<td><?= $produit['dateA'] ?></td>
</tr>
<?php 
					}
				?>	
</table>