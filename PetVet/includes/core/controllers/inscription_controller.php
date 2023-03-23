<?php
    

    switch ($action){
        case 'inscription':{
            require_once "includes/core/models/daoInscription.php";
            if(empty($_POST)){
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
                
                
                if (insertInscription($unProprietaire)){
                    header('Location: index.php');
                    
                }else{
                    $message = "Mail déja existant";
                   
                }
            }
                
            require_once "includes/core/views/formInscription.phtml";
            break;
        }

        case 'connexion':{

            require_once "includes/core/views/formConnexion.phtml";
            break;

        }

        
    
        default:{
    
        }
    }
       