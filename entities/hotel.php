<?php
	class  hotel
	{
		private int $id ;
		private string $name;
		private float $prix;
		private string	$image;
        private string $adresse;
        private string $caracteristiques ;
        private int $chambre;

		public function __construct($name,$prix,$image,$adresse,$caracteristiques,$chambre)
		{
			$this->name =$name;
			$this->prix = $prix;
			$this->image =$image;
            $this->adresse=$adresse;
            $this->caracteristiques=$caracteristiques;
            $this->chambre=$chambre;
		}
		 public function getId () {
            return $this->id;
        }

        public function getName (){
            return $this->name ;
        }

        public function getImage (){
            return $this->image ;
        }

        public function getPrix (){
            return $this->prix ;
        }

        public function getAdresse (){
            return $this->adresse ;
        }

        public function getCaracteristiques (){
            return $this->caracteristiques  ;
        }

        public function getChambre (){
            return $this->chambre ;
        }

        public function setName ($name){
            $this->name = $name;
        }

        public function setImage ($image){
            $this->image = $image;
        }

        public function setPrix ($prix){
            $this->prix = $prix;
        }

        public function setAdresse ($adresse){
            $this->adresse = $adresse;
        }

        public function setCaracteristiques ($caracteristiques){
            $this->caracteristiques= $caracteristiques;
        }

        public function setChambre ($chambre){
            $this->chambre = $chambre;
        }
	}
?>