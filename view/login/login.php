<?php
//init
session_start ();
session_unset ();
session_destroy ();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="login.css">
	
  <title>Se connecter</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<meta name="google-signin-client_id" content="59749501512-0gtq3ogkp86qt3980vivb2qefus87nef.apps.googleusercontent.com">

<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
  function onSignIn(googleUser) {
    var profile=googleUser.getBasicProfile();
   document.myform.id.value=profile.getId();
  }
</script>

</head>
<body>
<div class="topnav">
	<table>
  <colgroup>
<col style="width: 5%">
<col style="width: 76%">
<col style="width: 19%">
</colgroup>
<tr>
	<td>
<img src="../logo.jpg" id="logo">
	</td>
	
	<td class="title">
  MEW
	</td>
	<td>
<a href="../client/accueil.php">Mode invit&eacute;
</a>
  		
	</td>
</tr>
 </table>
 </div> 
<div class="left">
<form method="POST" name="myform" action="connexion.php">
<table>
  <tr> <td colspan="2" id="titre">Se connecter a MEW
  </td></tr>
  <tr>
    <td id="text">Identifiant
</td>
    <td><input type="text" name="id"></td> 
    </tr>
  <tr>
    <td id="text">Mot de passe </td>
    <td><input type="password" name="motdepasse"></td>
  </tr>
  <tr>
  	  	<td><input type=button name="s_inscrire" onclick=window.location.href='inscription.html'; value="S'inscrire" id="inscrire" ></td>

  	    <td><input type="submit" name="se_connecter" value="Se connecter"></td>
  </tr>
  <tr>
    <td colspan="2"><div class="g-signin2" data-onsuccess="onSignIn"></div>
     
    </td>
  </tr>
  <tr>
  	  	<td colspan="2" id="text"> <a href="#">Mot passe oubli&eacute;</a></td>  
</tr>
</table>
</form>
</div>

<div class="right">
</div>
<div class="footer">
  <p> Digital Natives 2021 &copy;
 Tous droits r&eacute;
serv&eacute;
s</p>
</div>

</body>
</html>