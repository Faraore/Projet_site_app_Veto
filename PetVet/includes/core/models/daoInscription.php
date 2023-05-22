<?php
    require_once "includes/core/models/bdd.php";
    require_once "includes/core/models/daoConnexion.php";
    require_once "includes/core/models/connexion.php";
    require_once "includes/core/models/proprietaire.php";


   

    function insertInscription(proprietaire $newProprietaire) : bool{
        $conn = getConnection();

        if(mailExists($newProprietaire->getMail())){
            return false;
            
        }
        //fonction qui me permet d'insert dans ma bdd en vue de crée un nouveaux proprietaire
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

        $SQLQuery2 ="INSERT INTO owner(id, last_name, first_name, address_number, street_address, post_code, city, id_connexion) 
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
            echo("Erreur sur l'inscription");
            $response = false;
        }else{
            $response = true;
        }
        $SQLStmt->closeCursor();
         return $response;
    }
    