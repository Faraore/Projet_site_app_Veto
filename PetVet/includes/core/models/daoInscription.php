<?php
    require_once "includes/core/models/bdd.php";
    require_once "includes/core/models/connexion.php";
    require_once "includes/core/models/proprietaire.php";


    function getUser() : array{
        $conn = getConnexion();

        $SQLQuery = "SELECT p.id, p.nom, p.prenom, p.date_naissance, p.numero_rue, p.nom_rue, p.taille, p.poids, p.complement_adresse ,
				civ.libelle_court, civ.libelle_long, cpv.codepostal, cpv.ville 
			FROM personne p INNER JOIN civilite civ ON p.id_civilite = civ.id
				INNER JOIN cp_ville cpv ON p.id_cp_ville = cpv.id;";
    }

    function insertInscription(proprietaire $newProprietaire) : bool{
        //fonction qui me permet d'insert dans ma bdd en vue de crée mon nvl user
        $SQLQuery = 
        "INSERT INTO proprietaires(nom) VALUES(:nom )
        INSERT INTO connexion(mail, password) VALUES(:mail,:password)";


        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':nom',$newProprietaire->getNom(),PDO::PARAM_STR);
        $SQLStmt->bindValue(':mail',$newProprietaire->getMail(),PDO::PARAM_STR);
        $SQLStmt->bindValue(':password',$newProprietaire->getPassword(),PDO::PARAM_STR);

        if(!$SQLStmt->execute()){
            return false;
        }else{
            return true;
        }
    }
    