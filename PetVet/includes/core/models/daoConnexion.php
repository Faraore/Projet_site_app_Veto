<?php
    require_once "includes/core/models/bdd.php";
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