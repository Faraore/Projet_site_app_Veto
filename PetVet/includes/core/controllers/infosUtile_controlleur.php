<?php
    switch ($action){
        case 'infos':{
            if(isset($_SESSION['mail'])){

            require_once "includes/core/views/infosUtile.phtml";
            }else{
                header('Location: index.php?page=connexion&action=connexion');
                exit();}
            break;
        }
    
        default:{
    
        }
    }