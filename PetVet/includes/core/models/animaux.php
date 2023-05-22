<?php

    class animaux{
        
        private int $c_id;
        private string $c_nom;
        private ?DateTime $c_dateNaissance;
        private DateTime $c_dateDeces;
        private ?poids $c_poids;
        private ?famille $c_famille;
        private ?sexe $c_sexe;

        //Constructeur Animaux
        public function __construct(string $nom = '', ?DateTime $dateNaissance = null, 
        ?poids $poids = null, ?famille $famille = null, ?sexe $sexe = null){

            
            $this->c_nom = htmlspecialchars($nom);

            //Gestion des paramètres null
            if (is_null($dateNaissance)){
                $this->c_dateNaissance = new DateTime("now");
            }else{
                $this->c_dateNaissance = $dateNaissance;
            }
           

            $this->c_poids = $poids ?? new poids(0);
            $this->c_famille = $famille ?? new famille('Chien');
            $this->c_sexe = $sexe ?? new sexe('Mâle');
               
        }
        
        //Getters & Setters
        public function getId(): int
        {
            return $this->c_id;
        }
    
        public function setId( int $id): void
        {
            $this->c_id = $id;

        }
       
        public function getNom(): string
        {
            return $this->c_nom;
        }
    
        public function setNom(string $nom): void
        {
            $this->c_nom = htmlspecialchars($nom);
        }
        public function getDateNaissance(): DateTime
        {
            return $this->c_dateNaissance;
        }
    
        public function setDateNaissance( DateTime $dateNaissance): void
        {
            $this->c_dateNaissance = $dateNaissance;
        }
        public function getDatadeces(): DateTime
        {
            return $this->c_dateDeces;
        }

        public function setDateDeces( DateTime $dateDeces): void
        {
            $this->c_dateDeces = $dateDeces;
        }
       
        public function getFamille(): famille
        {
            return $this->c_famille;
        }
       
        public function setFamille(famille $famille): void
        {
           $this->c_famille = $famille;
        }

        public function getPoids(): poids
        {
            return $this->c_poids;
        }
       
        public function setPoids(poids $poids): void
        {
           $this->c_poids = $poids;
        }

        public function getSexe(): sexe 
        {
            return $this->c_sexe;
        }
       
        public function setSexe(sexe $sexe): void
        {
           $this->c_sexe = $sexe;
        }

}

    

    






    