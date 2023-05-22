<?php
    switch ($action){
        case 'connexion':{
            require_once "includes/core/models/daoConnexion.php";
            
            if(!empty($_POST)){
                $mailSaisi = $_POST['champEmail'];
                $passwordSaisi = $_POST['champPassword'];
               

                if(mailExists($mailSaisi)){
                    if(checkCo($mailSaisi, $passwordSaisi)){

                        $_SESSION['mail'] = $mailSaisi;
                        $_SESSION['id'] = getIdbyMail($mailSaisi);
                        $_SESSION['name'] = getNameByMail($mailSaisi);

                        echo("Authentification reussi");
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
        
        case 'informations':{
            require_once "includes/core/models/daoConnexion.php";
            if(isset($_SESSION['mail'])){
                $unUser = getUserById($_SESSION['id']);
            
                if(empty($_POST)){

                    $unUser;
                    
            }else{
                //je viens de valider le form cliqué sur modifier
                    $unUser->setNom($_POST['champNom']);
                    $unUser->setPrenom($_POST['champPrenom']);
                    $unUser->getConnexion()->setMail($_POST['champEmail']);
                    $unUser->setNumAdresse($_POST['champNumAdresse']);
                    $unUser->setAdresse($_POST['champNomAdresse']);
                    $unUser->setCodePostal($_POST['champCodePostal']);
                    $unUser->setVille($_POST['champVille']);
            
                
                    if(updateUser($unUser)){
                        //TODO Message update effectué
                        header('Location: ?page=animaux&action=list');
                    }else{
                        $message = "Erreur de mise à jour de vos données";
                    }
                }
                require_once "includes/core/views/formModifUser.phtml";
                break;
            }else{
                header('Location: index.php?page=connexion&action=connexion');
            }   
                }
        
            default:{
        
            }
        
    }
    
       