<?php
require_once("../config.php");
class note
{
	private $note;
	
	
	public function __construct($note)
	
	{
		$this->note=$note;
		
		
		
		
		
	}
	        
	public function getNote(){return $this->note;}
	
	

	public function setNote($note){$this->note=$note;}
	
	
}

?>