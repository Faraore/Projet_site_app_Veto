<?php
    class sexe{

        private $c_id;
        private $c_sexe;

        //Constructeur sexe des animaux
        public function __construct(string $sexe)
        {
            $this->c_id = 0;
            $this->c_sexe = htmlspecialchars($sexe);
        }
    
        //Getters & Setters
        public function getId(): int
        {
            return $this->c_id;
        }
        public function setId( int $id ): void
        {
            $this->c_id = $id;
        }
        public function getSexe(): string
        {
            return $this->c_sexe;
        }
        public function setSexe( string $sexe ): void
        {
            $this->c_sexe = htmlspecialchars($sexe);
        }

    }
