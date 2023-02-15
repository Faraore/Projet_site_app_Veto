<?php
    switch ($action){
        case 'list' :{
            break;
        }
        case 'view' :{
            break;

        }
        case 'edit':{

			break;
		}
		case 'delete':{
		
			break;
		}
        case 'add' :{
            require_once "includes/cores/models/daoAnimaux.php";
            require_once "includes/cores/models/daoFamilleAnimaux.php";
           // require_once "includes/cores/models/daopoid.php";

           if (empty($_POST)){
            //j'arrive sur le form animaux
            $unAnimal = new animaux();

           }else{
            //je viens de valider le form cliqué sur submit
            $unAnimal = new animaux(
                
                getFamilleById($_POST['champFamille']);
                $_POST['champRace'];
                $_POST['champNom'];
                getSexeById($_POST['champSexe']);
                date_create($_POST['champDatenaissance']);
                date_create($_POST['champDateDeDeces']);
                $_POST['champPoid'];
            );
                if (insertAnimal($unAnimal)){
                header('Location: ?page=&action=list');
                }else{
                $message = "Erreur d'enregistrement";
                }

           }
           $lesFamilles = getAllFamilles();
           $lesSexes = getAllSexes ();

           require_once "includes/core/views/formAnimaux.phtml";
           break;

        }
        default:{
            
        }
    }