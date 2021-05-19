<?php
session_start();
    require_once '../controller/compteU.php';
    require_once '../assets/compte.php';
    if (isset($_POST["code"]))
    {
    	if ($_POST["code"] == $_SESSION['c']) 
    	{
            $compteU =  new compteU();
                $compteU->confirmationuser($_SESSION['e']);
                
    		        	header('Location:ProfilUser.php');

    	}
        echo "code errone";
    	
    } 
    


?>
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Project vigilantes || MEW </title>
<link  rel="stylesheet" href="../models/css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="../models/css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="../models/css/main.css">
 <link  rel="stylesheet" href="../models/css/font.css">
 <script src="../models/js/jquery.js" type="text/javascript"></script>

  <script src="../models/js/bootstrap.min.js"  type="text/javascript"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<head>
	<title></title>
</head>
<body>
	<form method="POST">
	<div align="center">
		<h1>entrez le code reçu</h1>
<input type="label" name="code">
<input type="submit"  value="verifier" >
</div>
</form>
</body>
</html>