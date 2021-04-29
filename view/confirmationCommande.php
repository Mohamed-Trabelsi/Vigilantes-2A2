<?PHP
include "../entities/commande.php";
include "../controller/commandeC.php";
include_once("../entities/mailing.php");
include_once("../controller/Gestion_compte.php");

session_start();

$gestion_compte=new Gestion_compte();
$liste_des_comptes=$gestion_compte->recupererCompte($_SESSION['id']);
foreach ($liste_des_comptes as $row) {
$adresse=$row['adresse_email'];
}


$message='<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>MEW : notification</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
        <tr>
            <td style="padding: 10px 0 30px 0;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                    <tr>
                        <td align="center" colspan="2" bgcolor="#d51d29" style="padding: 40px 0 30px 0; color: white; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                            Utique Fruit 
                        </td>
                    </tr>
                    <tr>
                    <td style="padding: 10px 0 30px 10px;" rowspan="2">
                     <img src="https://i.imgur.com/zetu42t.jpg" style="display: block;" />
                    </td>
                  <td style="padding: 8px 0 30px 35px; color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                                        <b>votre commande est bien validée  <b> ';


$message.=' 
                                    </td>
                                    
                  </tr>
                    
                                     <tr>
                                    <td style="padding: 0px 0 30px 35px; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                        Cet e-mail a été envoyé à ';
$message.=$adresse;

$message.=' car vous avez enregistré un compte sur mew Pour vous désabonner des futurs e-mails de notification promotionnelle, veuillez vous désabonner <a href="C:\wamp64\www\utique_fruit\views\login\desaboonermailing.php">ici</a>
                                    </td>
                                </tr>
                
                       
           
                    <tr>
                        <td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;" colspan="2">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
                                        Utique Fruit 2021 © Tous droits réservés<br/>
                                    </td>
                                    <td align="right" width="25%">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                    <a href="http://www.twitter.com/" style="color:white;">
                                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/tw.gif" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
                                                    </a>
                                                </td>
                                                <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                                                <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                    <a href="http://www.twitter.com/" style="color: white;">
                                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/fb.gif" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
</body>
</html>';
$m=new mailing($adresse,'Votre commande est validée',$message);
$m->envoyer();	
header('Location: afficherCommande.php');
	





?>