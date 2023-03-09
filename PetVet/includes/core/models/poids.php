<?php
    class poids {

        private int $c_id;
        private float $c_poids;
        

        public function __construct(float $poids){
            $this->c_id = 0;
            $this->c_poids = $poids;
        }

        public function getId(): int{
            return $this->c_id;
        }
        public function setId( int $id ): void{
            $this->c_id = $id;

        }
        public function getPoids(): float{
            return $this->c_poids;
        }
        public function setPoids( float $poids ): void{
            $this->c_poids = $poids;

        }
    }