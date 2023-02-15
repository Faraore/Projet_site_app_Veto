<?php
    switch ($action){
        case 'list' :{
            require_once "includes/core/models/daoAnimaux.php";
            require_once "includes/core/models/daoFamille.php";
            require_once "includes/core/models/daoPoids.php";

            $lesAnimaux = getAllAnimaux();
            $lesFamilles = getAllFamilles();
            $lesPoids = getAllPoids();


            require_once "includes/core/views/listeAnimaux.phtml";
            break;
        }
        case 'view' :{
            break;

        }
        case 'edit':{
            require_once "includes/core/models/daoAnimaux.php";
            require_once "includes/core/models/daoFamille.php";
            require_once "includes/core/models/daoSexe.php";
            require_once "includes/core/models/daoPoids.php";
           
            $unAnimal = getAnimalById($_GET['id']);
            
            if(empty($_POST)){
                //j'arrive sur le form animaux
                $unAnimal;
           }else{
            //je viens de valider le form cliqué sur modifier
                $unAnimal->setNom($_POST['champNom']);
                $unAnimal->setDateNaissance(new DateTime($_POST['champDateNaissance']));
                $unAnimal->setDateDeces(new DateTime($_POST['champDateDeces']));
                $unAnimal->getPoids()->setPoids($_POST['champPoids']);
                $unAnimal->setFamille(getFamilleById($_POST['champFamille']));
                $unAnimal->setSexe(getSexeById($_POST['champSexe']));
                
            /*if($_POST['champNom'] != $unAnimal->getNom()){
                    $unAnimal->setNom($_POST['champNom']);
                }
                if($_POST['champDateNaissance'] != $unAnimal->getDateNaissance()){
                    $unAnimal->setDateNaissance(new DateTime($_POST['champDateNaissance']));
                }
                if(isset($_POST['champDateDeces'])){
                    $unAnimal->setDateDeces(new DateTime($_POST['champDateDeces']));
                }
                if(($_POST['champPoids']) != $unAnimal->getPoids()->getPoids()){
                    $unAnimal->getPoids()->setPoids($_POST['champPoids']);
                }
                if(($_POST['champFamille']) != $unAnimal->getFamille()->getId()){
                    $unAnimal->getFamille()->setFamille(getFamilleById($_POST['champFamille']));
                }
                if(isset($_POST['champSexe']) != $unAnimal->getSexe()->getId()){
                    $unAnimal->getSexe()->setSexe(getSexeById($_POST['champSexe']));
                }*/            
            
            /*switch(!empty($_POST)){
                case(isset($_POST['champNom'])):{
                    $unAnimal->setNom($_POST['champNom']);
                    break;
                }
                case(isset($_POST['champDateNaissance'])):{
                    $unAnimal->setDateNaissance($_POST['champDateNaissance']);
                    break;
                }
                case(isset($_POST['champPoids'])):{
                    $unAnimal->setPoids($_POST['champPoids']);
                    break;
                }
                case(isset($_POST['champFamille'])):{
                    $unAnimal->setFamille->getFamilleById($_POST['champFamille']);   
                    break;
                }
                case(isset(($_POST['champSexe']))):{
                    $unAnimal->setSexe->getSexeById($_POST['champSexe']) ;
                    break;
                }
                default:{
            
                }
            }*/
                if(updateAnimal($unAnimal)){
                    header('Location: ?page=animaux&action=list');
                }else{
                    $message = "Erreur d'enregistrement";
                }
            }
            $lesFamilles = getAllFamilles();
            $lesSexes = getAllSexes();
            require_once "includes/core/views/formModifAnimal.phtml";
			break;
		}
		case 'delete':{
		
			break;
		}
        case 'add' :{
            require_once "includes/core/models/daoAnimaux.php";
            require_once "includes/core/models/daoFamille.php";
            require_once "includes/core/models/daoSexe.php";
            require_once "includes/core/models/daoPoids.php";

            //var_dump($_SESSION);
           if(empty($_POST)){
                //j'arrive sur le form animaux
                $unAnimal = new animaux();
           }else{
            //je viens de valider le form cliqué sur submit
                //var_dump($_POST);
                $unAnimal = new animaux(
                    
                    $_POST['champNom'],
                    new DateTime($_POST['champDateNaissance']),
                    new poids($_POST['champPoids']),
                    getFamilleById($_POST['champFamille']),
                    getSexeById($_POST['champSexe'])                
                );

                if(insertAnimal($unAnimal)){
                    header('Location: ?page=animaux&action=list');
                }else{
                    $message = "Erreur d'enregistrement";
                }
            }
            $lesFamilles = getAllFamilles();
            $lesSexes = getAllSexes();

            require_once "includes/core/views/formAnimaux.phtml";
            break;
        }
        default:{
            
        }
    }