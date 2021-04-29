<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['e']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: admin.php');
   }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<link  rel="stylesheet" href="../css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="../css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="../css/main.css">
 <link  rel="stylesheet" href="../css/font.css">
    <title>admin</title>
</head>
<body>
<button><a href="deconnexion.php">Déconnecter</a></button>
<button><a href="affichage.php">les comptes</a></button>
<button><a href="affichreclamation.php">les reclamations</a></button>
<hr>
<?php
// Il est bien connecté
echo 'Bienvenue admin ', $_SESSION['b'];
?>
</body>
</html>