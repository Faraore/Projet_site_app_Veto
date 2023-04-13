<?php

	/*
		?page=...&action=...&id=...

		page : Permettra de définir la section (ou page) à laquelle on veut accéder
		action : Permettra de définir l'action à effectuer sur cette section
		Le reste sera spécifique pour chaque section / action

		page : par défaut : index
		action : par defaut : view
	*/

	session_start();
	$page = $_GET['page'] ?? 'index';
	$action = $_GET['action'] ?? 'view'; 

	switch ($page){
        case 'index' :{
            require_once "includes/core/controllers/controller.php";
			break;
        }

        case 'inscription' :{
            require_once "includes/core/controllers/inscription_controller.php";
            break;
        }

		case 'connexion' :{
            require_once "includes/core/controllers/connexion_controller.php";
            break;
        }

		case 'contact' :{
            require_once "includes/core/controllers/contact_controller.php";
            break;
        }
		case 'animaux' :{
            require_once "includes/core/controllers/animaux_controller.php";
            break;
        }
        case 'infosUtile':{
            require_once "includes/core/controllers/infosUtile_controlleur.php";
            
            break;
        }
    }