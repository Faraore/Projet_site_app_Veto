<?php
    require_once "includes/core/models/bdd.php";
    require_once "includes/core/models/poids.php";

    function getAllPoids():array{
        $conn = getConnection();

        $SQLQuery = "SELECT id, weight
                     FROM weight";
        
        $SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$listePoids = array();
        
        $SQLStmt->closeCursor();
		return $listePoids;

    }

    
    function insertPoids(poids $newPoids): bool{
        $conn = getConnection();

        $SQLQuery = "INSERT INTO weight(weight) 
                     VALUES(:poids,)";

        $SQLStmt = $conn->prepare($SQLQuery);

        $SQLStmt->bindValue(':poids',$newPoids->getPoids(),PDO::PARAM_INT);

        if(!$SQLStmt->execute()){
            $response = false;
        }else{
            $response = true;
        }
        $SQLStmt->closeCursor();
        return $response;
    }