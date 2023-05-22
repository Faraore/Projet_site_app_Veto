<?php
    require_once "includes/core/models/bdd.php";
    require_once "includes/core/models/sexe.php";

    //fonction qui permet récupéré les sexes d'animaux en bdd 
    function getAllSexes(): array{
        $conn = getConnection();

        $SQLQuery = "SELECT id, gender 
                     FROM animals_gender";

        
		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->execute();
        
        $listeSexes = array();

        while($SQLRow =$SQLStmt->fetch(PDO::FETCH_ASSOC)){
            $unSexe = new sexe ($SQLRow['gender']);

            $unSexe->setId($SQLRow['id']);

            $listeSexes[] = $unSexe;
        }
        $SQLStmt->closeCursor();
        return $listeSexes;
    }

	//Creation d'un nv sexe depuis l'id récup dans le formulaire d'ajout
    function getSexeById(int $id): sexe{
		$conn = getConnection();

		$SQLQuery = "SELECT id, gender
			FROM animals_gender
			WHERE id = :id";

		$SQLStmt = $conn->prepare($SQLQuery);
		$SQLStmt->bindValue(':id', $id, PDO::PARAM_INT);
		$SQLStmt->execute();

		$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$unSexe = new sexe($SQLRow['gender']);
		$unSexe->setId($SQLRow['id']);
		
		$SQLStmt->closeCursor();
		return $unSexe;
	} 

