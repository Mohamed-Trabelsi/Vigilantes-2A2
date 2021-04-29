
<?php
session_start();
include_once '../assets/compteadmin.php';
include_once '../controller/compteA.php';
$message="";
$userC = new compteA();
if (isset($_POST["admin"]) &&
    isset($_POST["pazz"])) {
    if (!empty($_POST["admin"]) &&
        !empty($_POST["pazz"]))
    {   $message=$userC->connexionAdmin($_POST["admin"],$_POST["pazz"]);
         $_SESSION['e'] = $_POST["admin"];
         $result=$userC->getadminByEmail($_SESSION['e']);
         $_SESSION['a'] =$result['idAdmin'];
        
         $_SESSION['b'] =$result['name'];
         // on stocke dans le tableau une colonne ayant comme nom "e",
        //  avec l'email à l'intérieur
        if($message!='pseudo ou le mot de passe est incorrect'){
           header('Location:profiladmin.php');}
        else{
            $message='pseudo ou le mot de passe est incorrect';
        }}
    else
        $message = "Missing information";}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Project vigilantes || MEW </title>
<link  rel="stylesheet" href="../css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="../css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="../css/main.css">
 <link  rel="stylesheet" href="../css/font.css">
 <script src="../js/jquery.js" type="text/javascript"></script>

  <script src="../js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<script>
  function validaForm()
{var x = document.forms["foo"]["admin"].value;var atpos = x.indexOf("@");var dotpos = x.lastIndexOf(".");if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {alert("Not a valid e-mail address.");return false;}var a = document.forms["foo"]["pazz"].value;if(a == null || a == ""){alert("Password must be filled out");return false;}if(a.length<5 || a.length>25){alert("Passwords must be 5 to 25 characters long.");return false;}} 
  </script>

</head>

<body>

<?php include_once 'header.php'; ?>
  <button><a href="view.php">se connecter pour utilisateur</a></button>

<div class="bg1">
<div class="row">



<div class="col-md-0"></div>
<div class="col-md-4 panel">
 <form class="form-horizontal" name="foo" onSubmit="return validaForm()" method="POST">
   <fieldset>
     <div class="form-group">
  <label class="col-md-12 control-label" for="admin"></label>  
  <div class="col-md-12">
  <input id="admin" name="admin" placeholder="Enter your email" class="form-control input-md" type="text">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="pazz"></label>  
  <div class="col-md-12">
  <input id="pazz" name="pazz" placeholder="Enter your password" class="form-control input-md" type="password">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" class="sub" value="se connecter" class="btn btn-primary"/>
  </div>
</div>
   </fieldset>
</form>
</div><!--col-md-6 end-->

</div>
</div><!--container end-->

<?php include_once 'footer.php'; ?>
</body>

</html>
