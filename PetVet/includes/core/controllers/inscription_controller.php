<?php
    

    switch ($action){
        case 'inscription':{
            require_once "includes/core/models/daoInscription.php";
            if(empty($_POST)){
               // echo('formulaire vide');
                
                //$unProprietaire = new proprietaire();
            }else{
                $unProprietaire = new proprietaire(
                    $_POST['champNom'],
                    $_POST['champPrenom'],
                    intval($_POST['champNumAdresse']),
                    $_POST['champNomAdresse'],
                    intval($_POST['champCodePostal']),
                    $_POST['champVille'],
                    $uneConnexion = new connexion(
                        $_POST['champEmail'],
                        $_POST['champPassword'])
                    );
                
                //todo: message d'erreur si form vide
                if (insertInscription($unProprietaire)){
                    header('Location: index.php');
                    
                }else{
                    $message = "erreur d'enregistrement";
                    echo($message);
                    var_dump($_POST);
                }
            }
                
            require_once "includes/core/views/formInscription.phtml";
            break;
        }

        case 'connexion':{

            require_once "includes/core/views/formConnexion.phtml";
            break;

        }

        case 'deconnexion':{
            if (isset($_SESSION['login'])){
                unset($_SESSION['login']);
            }
            header('Location: index.php');
            break;
        }
    
        default:{
    
        }
    }
       