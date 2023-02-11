<?php

    class civilite{
        private $c_id; 
        private $c_libelleLong;
        private $c_libelleCourt;

        public function __construct(string $libelleLong, string $libelleCourt){
            $this->c_libelleLong = $libelleLong;
            $this->c_libelleCourt = $libelleCourt;
            $this->c_id = $id;
        }

        public function getId(): int{
            return $this->c_id;
        }
    
        public function setId(int $id): void{
            $this->c_id = $id;

    }
        public function getLibelleLong(): string{
            return $this->c_libelleLong;
        }

        public function setLibelleLong(string $libelleLong): void{
            $this->c_libelleLong = $libelleLong;
        }

        public function getLibelleCourt(): string{
            return $this->c_libelleCourt;
        }

        public function setLibelleCourt(string $libelleCourt): void{
            $this->c_libelleCourt = $libelleCourt;
        }
    }