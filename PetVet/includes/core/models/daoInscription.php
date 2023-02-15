<?php
    require_once "includes/core/models/bdd.php";
    require_once "includes/core/models/daoConnexion.php";
    require_once "includes/core/models/connexion.php";
    require_once "includes/core/models/proprietaire.php";


    /*function getUser() : array{
        $conn = getConnection();
        $response = false;

        $SQLQuery = "SELECT p.id, p.nom, p.prenom, p.date_naissance, p.numero_rue, p.nom_rue, p.taille, p.poids, p.complement_adresse ,
				civ.libelle_court, civ.libelle_long, cpv.codepostal, cpv.ville 
			FROM proprietaire p INNER JOIN civilite civ ON p.id_civilite = civ.id
				INNER JOIN cp_ville cpv ON p.id_cp_ville = cpv.id;";
    }*/

    function insertInscription(proprietaire $newProprietaire) : bool{
        $conn = getConnection();

        if(mailExists($newProprietaire->getMail())){
            return false;
            exit();
        }
        //fonction qui me permet d'insert dans ma bdd en vue de crée mon nvl user
        $SQLQuery = "INSERT INTO connexion(mail, password) 
                     VALUES(:mail,:password)";

        $SQLStmt = $conn->prepare($SQLQuery);
        
        $SQLStmt->bindValue(':mail',$newProprietaire->getMail(),PDO::PARAM_STR);
        $SQLStmt->bindValue(':password',$newProprietaire->getPassword(),PDO::PARAM_STR);

        if(!$SQLStmt->execute()){
            $response = false;
        }else{
            $response = true;
        }

        $SQLQuery2 ="INSERT INTO proprietaires(id, nom, prenom, numero_adresse, nom_adresse, codePostal, ville, id_connexion) 
                     VALUES(:id, :nom, :prenom, :numAdresse, :adresse, :codePostal, :ville, :idConnexion)";
        $SQLStmt2 = $conn->prepare($SQLQuery2);
        $SQLStmt2->bindValue(':id', $conn->lastInsertId(), PDO::PARAM_STR);
        $SQLStmt2->bindValue(':idConnexion', $conn->lastInsertId(), PDO::PARAM_STR);
        $SQLStmt2->bindValue(':nom',$newProprietaire->getNom(),PDO::PARAM_STR);
        $SQLStmt2->bindValue(':prenom',$newProprietaire->getPrenom(),PDO::PARAM_STR);
        $SQLStmt2->bindValue(':numAdresse',$newProprietaire->getNumAdresse(),PDO::PARAM_STR);
        $SQLStmt2->bindValue(':adresse',$newProprietaire->getAdresse(),PDO::PARAM_STR);
        $SQLStmt2->bindValue(':codePostal',$newProprietaire->getCodePostal(),PDO::PARAM_STR);
        $SQLStmt2->bindValue(':ville',$newProprietaire->getVille(),PDO::PARAM_STR);
        
        if(!$SQLStmt2->execute()){
            echo('Erreur sur le 2eme insert');
            $response = false;
        }else{
            $response = true;
        }
        $SQLStmt->closeCursor();
         return $response;
    }
    