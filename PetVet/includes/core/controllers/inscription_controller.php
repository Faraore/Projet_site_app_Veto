<?php
    switch ($action){
        case 'inscription':{
            require_once "includes/core/models/daoInscription.php";

            require_once "includes/core/views/formInscription.phtml";

            if(empty($_POST)){
                echo('formvide');
                //$unProprietaire = new proprietaire();
            }else{
                $unProprietaire = new proprietaire(
                    $_POST['champNom'],
                    $uneConnexion = new connexion(
                        $_POST['champEmail'],
                        $_POST['champPassword'])
                    );
                
                //doto: message d'erreur si form vide
                if (insertInscription($unProprietaire)){
                    header('Location: index.php');
                    echo("oki");
                }else{
                    $message = "erreur d'enregistrement";
                }
            }


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
       