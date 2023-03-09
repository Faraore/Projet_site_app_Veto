<?php
require_once "connexion.php";



class proprietaire{
    private int $c_id;
    private string $c_nom;
    private string $c_prenom;
    private int $c_numAdresse;
    private string $c_adresse;
    private string $c_codePostal;
    private string $c_ville;
    private connexion $c_connexion;
    
    
    
    public function __construct(string $nom ='', string $prenom ='', int $numAdresse = null, 
    string $adresse = '', string $codePostal = '', string $ville = '', connexion $connexion = null){
        
        
        $this->c_prenom = htmentities($prenom);
        $this->c_numAdresse = $numAdresse;
        $this->c_codePostal = $codePostal;
        $this->c_adresse = htmlentities($adresse);
        $this->c_ville = htmlentities($ville);
        $this->c_nom = htmlentities($nom);
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
        $this->c_nom = htmlentities($nom);

    }

   
    public function getPrenom(): string
    {
        return $this->c_prenom;
    }

    
    public function setPrenom(string $prenom): void
    {
        $this->c_prenom = htmlentities($prenom);

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
        $this->c_adresse = htmlentities($adresse);

    }

    
    public function getCodePostal(): string
    {
        return $this->c_codePostal;
    }

    
    public function setCodePostal($codePostal): void
    {
        $this->c_codePostal = htmlentities($codePostal);

    }
    public function getVille(): string
    {
        return $this->c_ville;
    }

    
    public function setVille($Ville): void
    {
        $this->c_ville = htmlentities($ville);

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