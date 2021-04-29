<?php



class panier
{   private $idP;
    private $prixP;
    private $qnt;
   
    
    
    function __construct($idP,$prixP,$qnt)
    {
        $this->idP=$idP;

            $this->prixP=$prixP;
              $this->qnt=$qnt;         
                 
                        
        
    }

function GetidP()
{
    return $this->idP;
}

function GetprixP()
{
    return $this->prixP;
}
function Getqnt()
{
    return $this->qnt;
}
function SetidP($idP)
{
$this->idP=$idP;
}

function Setdes($prixP)
{
$this->prixP=$prixP;
}

}



 ?>



 