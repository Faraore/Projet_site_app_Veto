<?php
require_once "includes/core/models/connexion.php";
require_once "includes/core/models/civilite.php";
require_once "include/core/models/pays.php";

class proprietaire{
    private $id;
    private $nom;
    private $prenom;
    private $dateNaissance;
    private $numAdresse;
    private $adresse;
    private $complementAdresse;
    private $civilite;
    private $connexion;
    private $pays;
    
    
    public function __construct(string $nom, string $prenom , date $dateNaissance, int $numAdresse,
    string $adresse, string $complementAdresse, string $civilite, string $connexion, string $pays ){
        
    }




}