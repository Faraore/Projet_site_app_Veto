<?php
require_once "connexion.php";
require_once "civilite.php";
require_once "pays.php";

class proprietaire{
    private $c_id;
    private $c_nom;
    private $c_prenom;
    private $c_dateNaissance;
    private $c_numAdresse;
    private $c_adresse;
    private $c_complementAdresse;
    private $c_civilite;
    private $c_connexion;
    private $c_pays;
    
    
    public function __construct(string $nom, connexion $connexion){
        //TODO:recup le dernier id enregistré
        $this->c_nom = $nom;
        $this->c_connexion = $connexion;      
    }
 
    public function getcId(): int
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


    public function setNom( string $nom): void
    {
        $this->c_nom = $nom;

    }

   
    public function getPrenom(): string
    {
        return $this->c_prenom;
    }

    
    public function setPrenom(string $prenom): void
    {
        $this->c_prenom = $prenom;

    }

  
    public function getDateNaissance(): DateTime
    {
        return $this->c_dateNaissance;
    }

   
    public function setDateNaissance( DateTime $dateNaissance): void
    {
        $this->c_dateNaissance = $dateNaissance;

    }


    public function getNumAdresse(): int
    {
        return $this->c_numAdresse;
    }

   
    public function setNumAdresse(int $numAdresse): void
    {
        $this->c_numAdresse = $numAdresse;

    }

   
    public function getAdresse(): string
    {
        return $this->c_adresse;
    }

    
    
    public function setAdresse(string $adresse):void
    {
        $this->c_adresse = $adresse;

    }

    
    public function getComplementAdresse(): string
    {
        return $this->c_complementAdresse;
    }

    
    public function setComplementAdresse($complementAdresse): void
    {
        $this->c_complementAdresse = $complementAdresse;

    }

}