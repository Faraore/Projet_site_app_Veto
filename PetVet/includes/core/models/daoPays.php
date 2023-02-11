<?php
    require_once "includes/core/models/bdd.php";
    require_once "includes/core/models/Civilite.php";
        //function qui me permet de renvoyer et d'executer ma table pays sous form de tableau 
    function getAllPays(): array{
        $conn = getConnexion();

        $SQLStmt = "SELECT id, code_postal, ville FROM pays"; //requette sql pui permet de selectionné ma table pays

        $SQLStmt = $conn->prepare($SQLQuery); //on prepare la requette sql
        $SQLStmt->execute();//on execute la requette

        $listePays = array();

        while($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
            $unPays = new pays($SQLRow['code_postal'], $SQLRow['ville']);

            $uneCivilite->setId($SQLRow['id']);

            $listeCivilites[] = $uneCivilite;
        }
        $SQLStmt->closeCursor();
        return $listeCivilites;
    }
