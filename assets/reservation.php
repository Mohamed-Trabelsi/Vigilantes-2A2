<?php
    class  reservation
    {
        private int $num ;
        private string $date;
        private string $check_in;
        private string  $check_out;
        private float $paiement;
        private int $hotel ;
        private int $client;

        public function __construct($date,$check_in,$check_out,$paiement,$hotel,$client)
        {
            $this->date =$date;
            $this->check_in = $check_in;
            $this->check_out =$check_out;
            $this->paiement=$paiement;
            $this->hotel=$hotel;
            $this->client=$client;
        }
         public function getNum () {
            return $this->num;
        }

        public function getDate (){
            return $this->date ;
        }

        public function getCheck_out (){
            return $this->check_out ;
        }

        public function getCheck_in (){
            return $this->check_in ;
        }

        public function getPaiement (){
            return $this->paiement ;
        }

        public function getHotel (){
            return $this->hotel  ;
        }

        public function getClient (){
            return $this->client ;
        }

        public function setDate ($date){
            $this->date = $date;
        }

        public function setCheck_out ($check_out){
            $this->check_out = $check_out;
        }

        public function setCheck_in ($check_in){
            $this->check_in = $check_in;
        }

        public function setPaiement ($paiement){
            $this->paiement = $paiement;
        }

        public function setHotel ($hotel){
            $this->hotel= $hotel;
        }

        public function setClient ($client){
            $this->client = $client;
        }
    }
?>