<?php
    switch ($action){
        case 'connexion':{
            require_once "includes/core/models/daoConnexion.php";
            
            if(!empty($_POST)){
                $mailSaisi = $_POST['champEmail'];
                $passwordSaisi = $_POST['champPassword'];
                //var_dump($_POST);

                if(mailExists($mailSaisi)){
                    print('Mail existant');
                    if(checkCo($mailSaisi, $passwordSaisi)){

                        $_SESSION['mail'] = $mailSaisi;
                        $_SESSION['id'] = getIdbyMail($mailSaisi);

                        print("Authentification reussi");
                        header("Location: ?page=animaux&action=add");
                    }else{
                        $message ="Information fausse";
                    }
                }else{
                    $message = "Utilisateur inexistant";
                }
            }
            require_once "includes/core/views/formConnexion.phtml";
            break;
        }

        case 'deconnexion':{
            if (isset($_SESSION['connexion'])){
                unset($_SESSION['connexion']);
            }
            header('Location: index.php');
            break;
        }
    
        default:{
    
        }
    }
    
       