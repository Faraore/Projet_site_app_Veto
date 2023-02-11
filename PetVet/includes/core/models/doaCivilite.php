<?php
    require_once "includes/core/models/bss.php";
    require_once "includes/core/models/civilite.php";
        //function qui me permet de renvoyer et d'executer ma table civilite sous form de tableau 
    function getAllCivilites(): array{
        $conn = getConnexion();

        $SQLQuery = "SELECT id, libelle_long, libelle_court FROM civilite";

        $SQLStmt = $conn->prepare($SQLQuery); //on prepare la requette sql
		$SQLStmt->execute();//on l'execute 

        $listeCivilites = array();

        while($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
            $uneCivilite = new civilite($SQLRow['libelle_long'], $SQLRow['libelle_court']);

            $uneCivilite->setId($SQLRow['id']);

            $listeCivilites[] = $uneCivilite;
        }
        $SQLStmt->closeCursor();
        return $listeCivilites;


    }