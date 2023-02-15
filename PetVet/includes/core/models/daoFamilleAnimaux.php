<?php
    require_once "includes/core/models/bdd.php";
    require_once "includes/core/models/familleAniamux.php";

    function getAllFamilles(): array{
        $conn = getConnection();
        
        $SQLQuery = "SELECT id, type_animal 
                     FROM famille";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();

		$listeFamilles = array();

		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			$unefamille = new famille($SQLRow['type_animal ']);
			
			$uneFamille->setId($SQLRow['id']);

			$listeFamilles[] = $uneFamille;
				
		}
		$SQLStmt->closeCursor();
		return $listeFamilles;
	} 
    function getFamillesById(int $id): famille{
		$conn = getConnexion();

		$SQLQuery = "SELECT id, type_animal
			FROM famille
			WHERE id = :id";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->bindValue(':id', $id, PDO::PARAM_INT);
		$SQLStmt->execute();

		$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$uneCivilite = new famille($SQLRow['type_animal']);
		$uneCivilite->setId($SQLRow['id']);
		
		$SQLStmt->closeCursor();
		return $uneCivilite;
	
    