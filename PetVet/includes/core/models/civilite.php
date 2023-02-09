<?php

    class civilite{
        private int $id; 
        private string $libelleLong;
        private string $libelleCourt;

        public function __construct(string $libelleLong, string $libelleCourt){
            $this->libelleLong = $libelleLong;
            $this->libelleCourt = $libelleCourt;
            $this->id = $id;
        }

        public function getId(): int{
            return $this->id;
        }
    
        public function setId(int $id): void{
            $this->id = $id;

    }
        public function getLibelleLong(): string{
            return $this->libelleLong;
        }

        public function setLibelleLong(): void{
            $this->libelleLong = $libelleLong;
        }

        public function getLibelleCourt(): string{
            return $this->libelleCourt;
        }

        public function setLibelleLong(): void{
            $this->libelleCourt = $libelleCourt;
        }