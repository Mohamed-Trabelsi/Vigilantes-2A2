<?php
	class produit
	{
		private int $idproduit ;
		private string $nomP;
		private int $prix;
		private string	$image;	
		public function __construct($nomP,$prix,$image)
		{
			$this->nomP =$nomP;
			$this->prix = $prix;
			$this->image =$image;
		}
		 public function getIdproduit () {
            return $this->idP;
        }

        public function getnomP (){
            return $this->nomP ;
        }

        public function getImage (){
            return $this->image ;
        }

        public function getPrix (){
            return $this->prix ;
        }

        public function setnomP ($nomP){
            $this->nomP = $nomP;
        }

        public function setImage ($image){
            $this->image = $image;
        }

        public function setPrix ($prix){
            $this->prix = $prix;
        }
	}
?>