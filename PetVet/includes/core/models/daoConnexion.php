<?php
    require_once "includes/core/models/bdd.php";

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

        return (password_verify($password, $passwordStocke));


    }