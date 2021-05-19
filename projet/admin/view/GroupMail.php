<?php
   require_once '../controller/EvenementC.php';
    require_once '../models/evenement.php';







/**
 * This example shows how to send a message to a whole list of recipients efficiently.
 */

//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

error_reporting(E_STRICT | E_ALL);

date_default_timezone_set('Etc/UTC');

require 'vendor/autoload.php';
  $EvenementC =  new EvenementC();
    if (isset($_GET['id'])) {
            $result = $EvenementC->getEvenementById_Group($_GET['id']);

      if ($result !== false) {
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
$mail->SMTPDebug = 1; 
$mail->Subject = 'Evenement Annule';

//Same body for all messages, so set this before the sending loop
//If you generate a different body for each recipient (e.g. you're using a templating system),
//set it inside the loop



//Connect to the database and select the recipients from your mailing list that have not yet been sent to
//You'll need to alter this to match your database
$f= implode($result);

$mysql = mysqli_connect('localhost', 'root', '');
mysqli_select_db($mysql, 'site_1_1');


$e = mysqli_query($mysql, "SELECT nom,id_group FROM evenements");

  foreach ($e as $eow)
  {
  if ($eow['id_group']==$f)
    {
        $body = 'Evenement nommé "'.$eow['nom'].'" a été annulé.';
        $mail->msgHTML($body);
        //msgHTML also sets AltBody, but if you want a custom one, set it afterwards
        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
    }
}



$r = mysqli_query($mysql, "SELECT contact,id,nom FROM groups");

foreach ($r as $row)
{
 if ($row['id']==$f)
{
  //echo''.$row['contact'].'';

    try {
    
        $mail->addAddress($row['contact']);
    } catch (Exception $e) {
        echo 'Invalid address skipped: ';
        
    }

    try {
        $mail->send();
        echo 'Message sent to :' . htmlspecialchars($row['nom']) . ' (' .
            htmlspecialchars($row['contact']) . ')<br>';
    } catch (Exception $e) {
        echo 'Mailer Error';
        //Reset the connection to abort sending this message
        //The loop will continue trying to send to the rest of the list
        $mail->getSMTPInstance()->reset();
    }
    //Clear all addresses and attachments for the next iteration
    $mail->clearAddresses();
    $mail->clearAttachments();
}}
}
$EvenementC->deleteEvenement($_GET['id']);
    header('Location:AfficherEvenement.php');
}