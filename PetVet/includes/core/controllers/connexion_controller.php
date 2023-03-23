<?php
    switch ($action){
        case 'connexion':{
            require_once "includes/core/models/daoConnexion.php";
            
            if(!empty($_POST)){
                $mailSaisi = $_POST['champEmail'];
                $passwordSaisi = $_POST['champPassword'];
                //var_dump($_POST);

                if(mailExists($mailSaisi)){
                    if(checkCo($mailSaisi, $passwordSaisi)){

                        $_SESSION['mail'] = $mailSaisi;
                        $_SESSION['id'] = getIdbyMail($mailSaisi);

                        print("Authentification reussi");
                        header("Location: ?page=animaux&action=list");
                    }else{
                        $message ="Information fausse";
                    }
                }else{
                    $message = "Utilisateur inexistant ou Erreur password";
                }
            }
            require_once "includes/core/views/formConnexion.phtml";
            break;
        }

        case 'deconnexion':{
            if (isset($_SESSION['mail'])){
                unset($_SESSION['mail']);
                unset($_SESSION['id']);
            }

            header('Location: index.php?page=index');
            break;
        }
    
        default:{
    
        }
    }
    
       