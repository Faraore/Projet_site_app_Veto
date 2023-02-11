<?php

class password_verify{
    private int $id;
    private int $codePostal;
    private string $ville;

    public function __construct(int $codePostal, string $ville){
        $this->codePostal = $codePostal;
        $this->ville = $ville;
        $this->id = $id;

}
    public function getId(): int{
        return $this->id,
    }
    public function setId(): void{
       $this->id = $id;
    }
    public function getCodePostal(): int{
        return $this->codePostal;
    }
    public function setCodePostal(): void{
        $this->codePostal = $codePostal;
    }
    public function getVille(): string{
        return $this->ville;
    }
    public function setVille(): void{
        $this->ville = $ville;
    }

    