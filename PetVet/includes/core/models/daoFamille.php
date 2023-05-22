<?php
    require_once "includes/core/models/bdd.php";
    require_once "includes/core/models/famille.php";

	//fonction qui permet récupéré les type d'animaux en bdd 
    function getAllFamilles(): array{
        $conn = getConnection();
        
        $SQLQuery = "SELECT id, family_type
                     FROM family GROUP BY family_type";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$listeFamilles = array();

		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$uneFamille = new famille($SQLRow['family_type']);
			
			$uneFamille->setId($SQLRow['id']);

			$listeFamilles[] = $uneFamille;
				
		}
		$SQLStmt->closeCursor();
		return $listeFamilles;
	}

	//Récupération d'une famille depuis l'id récup dans le formulaire d'ajout
    function getFamilleById(int $id): famille{
		$conn = getConnection();

		$SQLQuery = "SELECT id, family_type
			FROM family
			WHERE id = :id";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->bindValue(':id', $id, PDO::PARAM_INT);
		$SQLStmt->execute();

		$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$uneFamille = new famille($SQLRow['family_type']);
		$uneFamille->setId($SQLRow['id']);
		
		$SQLStmt->closeCursor();
		return $uneFamille;
	}
    