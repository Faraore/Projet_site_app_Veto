<?php

	require_once "includes/core/models/bdd.php";
	require_once "includes/core/models/animaux.php";
    require_once "includes/core/models/sexe.php";
    require_once "includes/core/models/poids.php";
    require_once "includes/core/models/famille.php";
    
    //Récupération des animaux du propriétaire connecté

    function getAllAnimaux(): array{
        $conn = getConnection();

        $SQLQuery = "SELECT a.id, a.nom, a.date_de_naissance, f.type_animal, s.sexe, pd.poids 
                        FROM animaux a 
                        INNER JOIN proprietaires p on p.id = a.id_proprietaires 
                        INNER JOIN famille f on a.id_famille = f.id 
                        INNER JOIN sexe_des_animaux s on s.id = a.id_sexe_des_animaux 
                        INNER JOIN poids pd on pd.id = a.id_poids
                        WHERE p.id = :id;";
                     
                     
        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
        $SQLStmt->execute();

        $listeAnimaux = array();
		while ($SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC)){
			
			$unAnimal = 
            new animaux(
                
                $SQLRow['nom'], 
                date_create($SQLRow['date_de_naissance']),
                new poids($SQLRow['poids']),
                new famille($SQLRow['type_animal']), 
                new sexe($SQLRow['sexe']));
			
			$unAnimal->setId($SQLRow['id']);

			$listeAnimaux[] = $unAnimal;
        }
        $SQLStmt->closeCursor();

		return $listeAnimaux;

    }
    

    //Insertion d'un nouvel animal dans la BDD
    function insertAnimal(animaux $newAnimal): bool {

        $conn = getConnection();

        $SQLQuery = "INSERT INTO poids(poids)
        VALUE (:poids)";
        $SQLStmt = $conn->prepare($SQLQuery);

        $SQLStmt->bindValue(':poids', $newAnimal->getPoids()->getPoids(),PDO::PARAM_INT);
        
        if(!$SQLStmt->execute()){
            echo("Erreur sur l'ajout de l'animal");
            $response = false;
        }else{
            $response = true;
        }

        $SQLQuery2 = "INSERT INTO animaux(nom, date_de_naissance, id_proprietaires, id_famille, id_sexe_des_animaux,id_poids)
                     VALUE (:nom, :date_de_naissance, :idProprietaire, :idFamille, :idSDA, :idPoids)";

        $SQLStmt2 = $conn->prepare($SQLQuery2);

        $SQLStmt2->bindValue(':nom', $newAnimal->getNom(),PDO::PARAM_STR);
        $SQLStmt2->bindValue(':date_de_naissance', $newAnimal->getDateNaissance()->format('Y-m-d'), PDO::PARAM_STR);
        $SQLStmt2->bindValue(':idProprietaire', $_SESSION['id'],PDO::PARAM_INT);
        $SQLStmt2->bindValue(':idFamille', $newAnimal->getFamille()->getId(),PDO::PARAM_INT);
        $SQLStmt2->bindValue(':idSDA', $newAnimal->getSexe()->getId(),PDO::PARAM_INT);
        $SQLStmt2->bindValue(':idPoids',$conn->lastInsertId(), PDO::PARAM_INT);


        if(!$SQLStmt2->execute()){
            echo("Erreur sur l'ajout de l'animal");
            $response = false;
        }else{
            $response = true;
        }
        $SQLStmt2->closeCursor();
         return $response;

    }
    //recuperation d'un animal via son id 
    function getAnimalById(int $id): animaux{
        $conn = getConnection();

        $SQLQuery = "SELECT a.id, a.nom, a.date_de_naissance, f.type_animal, f.id as idFamille, s.sexe, s.id as idSexe, pd.id as idPoids, pd.poids
                        FROM animaux a 
                        INNER JOIN proprietaires p on p.id = a.id_proprietaires 
                        INNER JOIN famille f on a.id_famille = f.id 
                        INNER JOIN sexe_des_animaux s on s.id = a.id_sexe_des_animaux 
                        INNER JOIN poids pd on pd.id = a.id_poids
                        WHERE a.id = :id;";
                     
                     
        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':id', $id, PDO::PARAM_INT);
        $SQLStmt->execute();

        
        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $unAnimal = new animaux(               
                $SQLRow['nom'], 
                date_create($SQLRow['date_de_naissance']),
                new poids($SQLRow['poids']),
                new famille($SQLRow['type_animal']), 
                new sexe($SQLRow['sexe']));

                $unAnimal->setId($SQLRow['id']);
                $unAnimal->getFamille()->setId($SQLRow['idFamille']);
                $unAnimal->getSexe()->setId($SQLRow['idSexe']);
                $unAnimal->getPoids()->setId($SQLRow['idPoids']);
                

        
        $SQLStmt->closeCursor();
            
		return $unAnimal;
    }
// function qui me permet de modifier un animal dans ma bdd 
// on prepare plusieur requetes car il y a plusieur tables a modif dans la bdd 
function updateAnimal(animaux $newAnimal): bool{
    
        $conn = getConnection();


        $SQLQuery = "UPDATE animaux
        SET nom = :nom, date_de_naissance = :date_de_naissance, id_famille = :idFamille, id_sexe_des_animaux = :idSexe
        WHERE id = :id";

        $SQLStmt = $conn->prepare($SQLQuery);

        $SQLStmt->bindValue(':nom', $newAnimal->getNom(),PDO::PARAM_STR);
        $SQLStmt->bindValue(':date_de_naissance', $newAnimal->getDateNaissance()->format('Y-m-d'), PDO::PARAM_STR);
        $SQLStmt->bindValue(':idFamille', $newAnimal->getFamille()->getId(),PDO::PARAM_INT);
        $SQLStmt->bindValue(':idSexe', $newAnimal->getSexe()->getId(),PDO::PARAM_INT);
        $SQLStmt->bindValue(':id', $newAnimal->getId(),PDO::PARAM_INT);
        $SQLStmt->execute();

        if(!$SQLStmt->execute()){
             echo('Erreur de modification');
             $response = false;
        }else{
             $response = true;
        }

        $SQLQuery2 = "UPDATE poids
        SET poids = :poids
        WHERE id = :id";

        $SQLStmt2 = $conn->prepare($SQLQuery2);
        $SQLStmt2->bindValue(':poids', $newAnimal->getPoids()->getPoids(),PDO::PARAM_INT);
        $SQLStmt2->bindValue(':id', $newAnimal->getId(),PDO::PARAM_INT);
        $SQLStmt2->execute();

        if(!$SQLStmt2->execute()){
            echo('Erreur de modification');
            $response = false;
        }else{
            $response = true;
        }

        $SQLStmt2->closeCursor();
        return $response;

    }
    function deleteAnimal(animaux $unAnimal): bool{
        //Déclencher un delete 
            $conn = getConnection();

            $SQLQuery = "DELETE FROM animaux WHERE animaux.id = :id";
            
    
            $SQLStmt = $conn->prepare($SQLQuery);

            
            $SQLStmt->bindValue(':id', $unAnimal->getId(),PDO::PARAM_INT);
            $SQLStmt->execute();
    
            if(!$SQLStmt->execute()){
                 echo("Impossible de supprimer l'animal");
                 $response = false;
            }else{
                 $response = true;
            }

            $SQLQuery2 = "DELETE FROM poids WHERE poids.id = :id";
    
            $SQLStmt2 = $conn->prepare($SQLQuery2);
            
            $SQLStmt2->bindValue(':id', $unAnimal->getPoids()->getId(), PDO::PARAM_INT);
            $SQLStmt2->execute();
    
            if(!$SQLStmt2->execute()){
                echo("Impossible de supprimer le poids de l'animal");
                $response = false;
            }else{
                $response = true;
            }

            $SQLStmt2->closeCursor();
            return $response;
    
           
    
        }