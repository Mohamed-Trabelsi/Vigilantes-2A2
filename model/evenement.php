<?php
	class evenement 
	{
		
		private $id;
		private $nom;
        private $adresse;
		private $dateD;
        private $dateF;
		private $nb_participant;	
        private $image;
        private $id_group;
		public function __construct($nom,$adresse,$dateD,$dateF,$nb_participant,$image,$id_group)
		{

		
			$this->nom =$nom;
			$this->adresse= $adresse;
            $this->dateD =$dateD;
			$this->dateF =$dateF;
            $this->nb_participant =$nb_participant;
            $this->image =$image;
               $this->id_group =$id_group;
 
		}
		 public function getIdEvenement () {
            return $this->id;
        }

        public function getNom (){
            return $this->nom ;
        }

        public function getAdresse (){
            return $this->adresse ;
        }

        public function getdateD (){
            return $this->dateD ;
        }
         public function getdateF (){
            return $this->dateD ;
        }

     public function getNb_participant (){
            return $this->nb_participant ;
        }
        
        public function getImage (){
            return $this->image ;
        }
        
          public function getId_group (){
            return $this->id_group ;
        }
  
      




        public function setNom ($nom){
            $this->nom= $nom;
        }

        public function setAdresse ($adresse){
            $this->adresse= $adresse;
        }

        public function setDateD ($dateD){
             $this->dateD = $dateD ;
        }

  public function setDateF ($dateF){
            $this->dateF = $dateF;
        }

         public function setNb_participant ($nb_participant){
            $this->nb_participant = $nb_participant;
        }

        public function setImage ($image){
            $this->image = $image;
        }
  
     public function setId_group ($id_group){
            $this->id_group = $id_group;
        }
  
        
	}
?>