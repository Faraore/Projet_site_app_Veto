<?php
    switch ($action){
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
       