<?php
    require_once "includes/core/models/bdd.php";
    require_once "includes/core/models/proprietaire.php";
    require_once "includes/core/models/connexion.php";
    // permet de verifier q'un mail existe au sein de ma bdd et qu'il soit uniqye 
    function mailExists($mail): bool{
        $conn = getConnection();

        $SQLQuery = "SELECT COUNT(id) as existe
        FROM connexion
        WHERE mail = :mail";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':mail', $mail, PDO::PARAM_STR);
        $SQLStmt->execute();

        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $mailTrouve = $SQLRow['existe'];

        $SQLStmt->closeCursor();

        if($mailTrouve > 0){
            return true;
        }else{
            return false;
        }
    }
    // recupere le mail via id 
    function getIdbyMail(string $mail): int{
        $conn = getConnection();

        $SQLQuery = "SELECT id FROM connexion WHERE mail = :mail";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':mail', $mail, PDO::PARAM_STR);
        $SQLStmt->execute();

        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$idUser = $SQLRow['id'];

        $SQLStmt->closeCursor();

        return ($idUser);

    }
    function getNamebyMail(string $mail): string{
        $conn = getConnection();

        $SQLQuery = "SELECT o.first_name FROM owner o INNER JOIN connexion c on c.id = o.id_connexion WHERE c.mail = :mail";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':mail', $mail, PDO::PARAM_STR);
        $SQLStmt->execute();

        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$nameUser = $SQLRow['first_name'];

        $SQLStmt->closeCursor();

        return ($nameUser);

    }
    // compare le password rentré a celui dans la bdd 
    function checkCo($mail, $password): bool{
        $conn = getConnection();

        $SQLQuery = "SELECT password 
                     FROM connexion
                     WHERE mail = :mail";

        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':mail', $mail, PDO::PARAM_STR);
        $SQLStmt->execute();

        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$passwordStocke = $SQLRow['password'];

        $SQLStmt->closeCursor();
        //password_verify => verifie si le pwd haché est bien le pwd donné 
        return (password_verify($password, $passwordStocke));
    }

    //recuperation d'un user via son id 
    function getUserById(int $id): proprietaire
    {
        $conn = getConnection();

        $SQLQuery = "SELECT p.id, p.last_name, p.first_name, p.address_number, p.street_address, p.post_code, p.city, c.mail, c.password
                        FROM owner p 
                        INNER JOIN connexion c on c.id = p.id_connexion 
                        WHERE p.id = :id;";
                        
                        
        $SQLStmt = $conn->prepare($SQLQuery);
        $SQLStmt->bindValue(':id', $id, PDO::PARAM_INT);
        $SQLStmt->execute();

        
        $SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
        $unUser = new proprietaire(             
                $SQLRow['last_name'], 
                $SQLRow['first_name'],
                $SQLRow['address_number'],
                $SQLRow['street_address'],
                $SQLRow['post_code'],
                $SQLRow['city'],
                new connexion($SQLRow['mail'], $SQLRow['password']));

        $unUser->setId($SQLRow['id']);
        $unUser->getConnexion()->setId($SQLRow['id']);
        
        $SQLStmt->closeCursor();
            
        return $unUser;
    }

    //modification d'un user
    function updateUser(proprietaire $newUser): bool
        {
    
            $conn = getConnection();
       
            $SQLQuery = "UPDATE owner
            SET last_name = :nom, first_name = :prenom, address_number = :numero_adresse, street_address = :nom_adresse, post_code = :codePostal,
            city = :ville
            WHERE id = :id";
    
            $SQLStmt = $conn->prepare($SQLQuery);
    
            $SQLStmt->bindValue(':nom', $newUser->getNom(),PDO::PARAM_STR);
            $SQLStmt->bindValue(':prenom', $newUser->getPrenom(), PDO::PARAM_STR);
            $SQLStmt->bindValue(':numero_adresse', $newUser->getNumAdresse(),PDO::PARAM_INT);
            $SQLStmt->bindValue(':nom_adresse', $newUser->getAdresse(), PDO::PARAM_STR);
            $SQLStmt->bindValue(':codePostal', $newUser->getCodePostal(),PDO::PARAM_STR);
            $SQLStmt->bindValue(':ville', $newUser->getVille(),PDO::PARAM_STR);
            $SQLStmt->bindValue(':id', $newUser->getId(),PDO::PARAM_INT);
            $SQLStmt->execute();
    
            if(!$SQLStmt->execute()){
                 echo('Erreur de modification proprietaire');
                 $response = false;
            }else{
                 $response = true;
            }

            $SQLQuery2 = "UPDATE connexion SET mail = :mail WHERE id = :id";
    
            $SQLStmt2 = $conn->prepare($SQLQuery2);
    
            $SQLStmt2->bindValue(':mail', $newUser->getConnexion()->getMail(),PDO::PARAM_STR);
            $SQLStmt2->bindValue(':id', $newUser->getConnexion()->getId(),PDO::PARAM_INT);
            $SQLStmt2->execute();
    
            if(!$SQLStmt2->execute()){
                 echo('Erreur de modification connexion');
                 $response = false; 
            }else{
                 $response = true;
            }

            $SQLStmt2->closeCursor();
            return $response;
        }