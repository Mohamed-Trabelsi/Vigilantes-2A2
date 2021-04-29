<?php 

class Mailing 
{ private $header;  
  private $message;
  private $subject;
  private $to;
	
	function __construct($to,$subject,$message)
	{$this->header="MIME-Version: 1.0\r\n";
$this->header.='From:"MEW.com"'."\n";
$this->header.='Content-Type:text/html; charset="uft-8"'."\n";
$this->header.='Content-Transfer-Encoding: 8bit';
     $this->to=$to;
     $this->subject=$subject;
     $this->message=$message;
	}
	function envoyer(){
	try{	
    mail($this->to,$this->subject,$this->message,$this->header);
	}
     catch(Exception $e){
            die ('erreur : '.$e->getMessage());

        }	
}
}
?>