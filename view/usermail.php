
<?php 
require_once '../controller/compteU.php';
    require_once '../assets/compte.php';
    //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

session_start();
 
if (isset($_POST["email"]))
{
                     
try {
    //Server settings

$mail->SMTPDebug = SMTP::DEBUG_SERVER;   
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'jesusmhiri@gmail.com';                     //SMTP username
    $mail->Password   = 'chnouwa14';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('jesusmhiri@gmail.com', 'MEW');
    $mail->addAddress($_GET['mail']);     //Add a recipient
   $key ="";
for ($i=1;$i<12;$i++)
{$key .=mt_rand(0,9);}
$_SESSION['c'] = $key;
$_SESSION['e'] = $_GET['mail'];
    $body='<html>
                        <body>
                           <div align="center">
                                  <h1>veuillez confirmer votre mail</h1>
                              <h4> veuillez entrer ce code '.$key.'</h4>
                           </div>
                        </body>
                     </html>';

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'confirmation mail';
    $mail->Body    = strip_tags($body);
    

    $mail->send();
    header('Location:confirmuser.php');
    echo 'Message has been sent';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

                    
                     
                 } 	

 ?>
 <!DOCTYPE html>
<html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
	<title>
		confirmer votre mail
	</title>
</head>
<body>
<form method="POST">
<div align="center">

<h1>veuillez confirmer votre mail</h1>
<input type="submit"  value="recevoir mail" name="email">
</div>
</form>
</body>
</html>