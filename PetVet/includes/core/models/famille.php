<?php
    class famille{

        private int $c_id;
        private string $c_type;

        //Constructeur de la classe Famille
        public function __construct(string $type =''){
            $this->c_id = 0;
            $this->c_type = $type;
        }

        //Getters & Setters
        public function getId(): int
        {
            return $this->c_id;
        }

        public function setId(int $id): void
        {
           $this->c_id = $id;
        }

        public function getType(): string
        {
            return $this->c_type;
        }

        public function setType(string $type): void
        {
           $this->c_type = $type;
        }

        /* TODO - Hors MVP(Produit minimum viable)
        public function getRace(): string{
            return $this->c_race;
        }
        public function setRace(string $race): void{
           $this->c_race = $race;
        }*/
        





    }