<?php
    require_once "includes/core/models/bdd.php";
    require_once "includes/core/models/famille.php";

	//fonction qui permet récupéré les type d'animaux en bdd 
    function getAllFamilles(): array{
        $conn = getConnection();
        
        $SQLQuery = "SELECT id, type_animal 
                     FROM famille GROUP BY type_animal";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$listeFamilles = array();

		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$uneFamille = new famille($SQLRow['type_animal']);
			
			$uneFamille->setId($SQLRow['id']);

			$listeFamilles[] = $uneFamille;
				
		}
		$SQLStmt->closeCursor();
		return $listeFamilles;
	}

	//Creation d'une nvl famille depuis l'id récup dans le formulaire d'ajout
    function getFamilleById(int $id): famille{
		$conn = getConnection();

		$SQLQuery = "SELECT id, type_animal
			FROM famille
			WHERE id = :id";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->bindValue(':id', $id, PDO::PARAM_INT);
		$SQLStmt->execute();

		$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$uneFamille = new famille($SQLRow['type_animal']);
		$uneFamille->setId($SQLRow['id']);
		
		$SQLStmt->closeCursor();
		return $uneFamille;
	}
	
	//Retourne une famille complète depuis le type & la race
	/*function getFamillebyType(string $race, string $type): famille{
		$conn = getConnection();

		if(empty($race)){
			$SQLQuery = "SELECT id, type_animal, race
				FROM famille
				WHERE race IS NULL AND type_animal = :type";
		}else{
			$SQLQuery = "SELECT id, type_animal, race
			FROM famille
			WHERE race =:race AND type_animal = :type";
		}

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->bindValue(':race', $race, PDO::PARAM_STR);
		$SQLStmt->bindValue(':type', $type, PDO::PARAM_STR);
		$SQLStmt->execute();

		$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$uneFamille = new famille($SQLRow['type_animal'], $SQLRow['race']);
		
		$uneFamille->setId($SQLRow['id']);
		
		$SQLStmt->closeCursor();
		return $uneFamille;
	}*/
    