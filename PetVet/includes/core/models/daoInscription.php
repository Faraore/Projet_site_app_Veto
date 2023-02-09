<?php
    require_once "includes/core/models/bdd.php";
    require_once "includes/core/models/connexion.php"


   function insertInscription(){//fonction qui me permet d'insert ma bdd en vue de crée mon nvl user
       /$SQLQuery = "INSERT INTO proprietaires(nom,)
        VALUES(:nom, )"
        $SQLQuery = "INSERT INTO connecion(mail,password)
        VALUE(:mail,:password)";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':nom',$newProprietaire->getNom(),PDO::PARAM_STR);
        $SQLStmt->bindValue(':mail',$newConnexion->getMail(),PDO::PARAM_STR);
        $SQLStmt->bindValue(':password',$newConnexion->getPassword(),PDO::PARAM_STR);

        if(!$SQLStmt->execute()){
            return false;
        }else{
            return true;
        }
    }