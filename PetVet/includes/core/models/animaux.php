<?php
    class animaux(){
        
        private $c_id;
        private $c_race;
        private $c_nom;
        private $c_dateNaissance;
        private $c_dateDeces;
        private $c_poid
        private $c_type

        public function __construct(string $race, string $nom, DateTime $dateNaissance = null, DateTime $dateDeces = null, poid $poid, famille $type){
            
            $conn = getConnection();
            
            $this->c_race = $race;
            $this->c_nom = $nom;
            $this->c_dateNaissance = $dateNaissance;
            $this->c_dateDeces = $dateDeces;
            $this->c_poid = $poid;
            $this->c_type = $type;
               
        }
        
        public function getId(): int
        {
            return $this->c_id;
        }
    
        public function setId( int $id): void
        {
            $this->c_id = $id;

        }
        public function getRace(): string
        {
            return $this->c_race;
        }
    
        public function setRace( string $race): void
        {
            $this->c_race = $race;

        }
        public function getNom(): string
        {
            return $this->c_nom;
        }
    
        public function setNom( string $nom): void
        {
            $this->c_nom = $nom;

        }
        public function getDateNaissance(): date
        {
            return $this->c_dateNaissance;
        }
    
        public function setDateNaissance( date $dateNaissance): void
        {
            $this->c_dateNaissance = $dateNaissance;

        }
        public function getDatadeces(): date

        return $this->c_dateDeces;


        public function setDateDeces( date $dateDeces): void
        {
        $this->c_dateDeces = $dateDeces;

        }
       
        public function getType(): string{
            return $this->c_type;
        }
       
        public function setType(string $type): void{
           $this->c_type = $type;
        }

}
    

    






    