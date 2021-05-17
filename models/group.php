<?php
	class group 
	{
		
		private $id;
		private $nom;
		private $num;
        private $contact;
		private $image;	
        private $description;
		public function __construct($nom,$num,$contact,$image,$description)
		{

		
			$this->nom =$nom;
			$this->num = $num;
            $this->contact =$contact;
			$this->image =$image;
            $this->description =$description;
		}
		 public function getIdGroup () {
            return $this->id;
        }

        public function getNom (){
            return $this->nom ;
        }

        public function getNum (){
            return $this->num ;
        }

        public function getContact (){
            return $this->contact ;
        }

        public function getImage (){
            return $this->image ;
        }
        
           public function getDescription (){
            return $this->description ;
        }
        




        public function setNom ($nom){
            $this->nom= $nom;
        }

        public function setNum ($num){
            $this->num= $num;
        }

        public function setContact ($contact){
             $this->contact = $contact ;
        }

        public function setImage ($image){
            $this->image = $image;
        }
    public function setDescription ($description){
            $this->description = $description;
        }

        
	}
?>