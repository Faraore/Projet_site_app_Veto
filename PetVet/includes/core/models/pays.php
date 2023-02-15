<?php

class pays{
    private $c_id;
    private $c_codePostal;
    private $c_ville;

    public function __construct(int $codePostal, string $ville){
        $this->c_codePostal = $codePostal;
        $this->c_ville = $ville;
        $this->c_id = $id;

    }
    public function getId(): int{
        return $this->c_id;
    }
    public function setId(int $id): void{
       $this->c_id = $id;
    }
    public function getCodePostal(): int{
        return $this->c_codePostal;
    }
    public function setCodePostal(int $codePostal): void{
        $this->c_codePostal = $codePostal;
    }
    public function getVille(): string{
        return $this->c_ville;
    }
    public function setVille(string $ville): void{
        $this->c_ville = $ville;
    }
}
    