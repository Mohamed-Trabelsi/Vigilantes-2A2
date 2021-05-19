<?php
   require_once '../controller/CommandeC.php';
    require_once '../models/commande.php';







/**
 * This example shows how to send a message to a whole list of recipients efficiently.
 */

//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

error_reporting(E_STRICT | E_ALL);

date_default_timezone_set('Etc/UTC');

require 'vendor/autoload.php';


      
//Passing `true` enables PHPMailer exceptions
$mail = new PHPMailer(true);



$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPSecure = 'tls';  
$mail->SMTPAuth = true;
$mail->Port = 587;
$mail->Username = 'vigilantes.beam@gmail.com';
$mail->Password = 'ghtyfvhg74158fd';
$mail->setFrom('vigilantes.beam@gmail.com', 'Admin');
//$mail->SMTPDebug = 1; 
$mail->Subject = 'PASSAGE DE COMMANDE';
$body = 'VOTRE COMMANDE EST CONFIRME PAR L ADMIN ET EN COURS DE LIVRAISON';
        $mail->msgHTML($body);
//Same body for all messages, so set this before the sending loop
//If you generate a different body for each recipient (e.g. you're using a templating system),
//set it inside the loop



//Connect to the database and select the recipients from your mailing list that have not yet been sent to
//You'll need to alter this to match your database


$mysql = mysqli_connect('localhost', 'root', '');
mysqli_select_db($mysql, 'site_1_1');






$r = mysqli_query($mysql, "SELECT id_commande,id_utilisateur,prix_total FROM commande");

foreach ($r as $row)
{
 
  //echo''.$row['contact'].'';

    try {
    
$mail->addAddress('moeneszribi1@gmail.com');
    } catch (Exception $e) {
        echo 'Invalid address skipped: ';
        
    }

    try {
        $mail->send();
        echo 'Message sent to :' . htmlspecialchars($row['id_utilisateur']) . ' (' .
            htmlspecialchars('moeneszribi1@gmail.com') . ')<br>';
    } catch (Exception $e) {
        echo 'Mailer Error';
        //Reset the connection to abort sending this message
        //The loop will continue trying to send to the rest of the list
        $mail->getSMTPInstance()->reset();
    }
    //Clear all addresses and attachments for the next iteration
    $mail->clearAddresses();
    $mail->clearAttachments();
}

?>