<?php
require_once "connexion.php";
require_once "bdd.php";


class proprietaire{
    private $c_id;
    private $c_nom;
    private $c_prenom;
    private $c_numAdresse;
    private $c_adresse;
    private $c_codePostal;
    private $c_ville;
    private $c_connexion;
    
    
    
    public function __construct(string $nom, string $prenom, int $numAdresse, string $adresse, int $codePostal, string $ville, connexion $connexion){
        //TODO:recup le dernier id enregistré
        $conn = getConnection();
        
        $this->c_prenom = $prenom;
        $this->c_numAdresse = $numAdresse;
        $this->c_codePostal = $codePostal;
        $this->c_adresse = $adresse;
        $this->c_ville = $ville;
        $this->c_nom = $nom;
        $this->c_connexion = $connexion;      
    }
 
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

    
    public function getCodePostal(): string
    {
        return $this->c_codePostal;
    }

    
    public function setCodePostal($codePostal): void
    {
        $this->c_codePostal = $codePostal;

    }
    public function getVille(): string
    {
        return $this->c_ville;
    }

    
    public function setVille($Ville): void
    {
        $this->c_ville = $ville;

    }

    public function setMail(): void
    {
        $this->c_connexion->setMail();
    }

    public function getMail(): string
    {
        return $this->c_connexion->getMail();
    }

    public function getPassword(): string
    {
        return $this->c_connexion->getPassword();
    }

    public function setPassword(): void
    {
        $this->c_connexion->setPassword();
    }

}