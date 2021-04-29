<?php
session_start();
session_destroy();?>

<!DOCTYPE html>
<html>
<head>
	<link  rel="stylesheet" href="../css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="../css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="../css/main.css">
 <link  rel="stylesheet" href="../css/font.css">
	<title></title>
</head>
<body>
<?php  echo 'Vous êtes déconnecté. <a href="./view.php">Se connecter ?</a>';?>
</body>
</html>
