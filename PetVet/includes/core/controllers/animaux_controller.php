<?php
    switch ($action){
        case 'list' :{
            // affiche les animaux du proprietaire via le mail de connexion 
            if(!isset($_SESSION['mail'])){
                header('Location: index.php?page=connexion&action=connexion');
            }else{
                require_once "includes/core/models/daoAnimaux.php";
                require_once "includes/core/models/daoFamille.php";
                require_once "includes/core/models/daoPoids.php";

                $Owner = $_SESSION['name'];
                $lesAnimaux = getAllAnimaux();
                $lesFamilles = getAllFamilles();
                $lesPoids = getAllPoids();


                require_once "includes/core/views/listeAnimaux.phtml";
                break;
            }
        }
        case 'view' :{
            break;

        }
        case 'edit':{
            require_once "includes/core/models/daoAnimaux.php";
            require_once "includes/core/models/daoFamille.php";
            require_once "includes/core/models/daoSexe.php";
            require_once "includes/core/models/daoPoids.php";
           
            if(isset($_SESSION['mail'])){
                $unAnimal = getAnimalById($_GET['id']);
                      
                if(empty($_POST)){
                    
                    $unAnimal;
                    
                }else{
                //je viens de valider le form cliqué sur modifier
                    $unAnimal->setNom($_POST['champNom']);
                    $unAnimal->setDateNaissance(new DateTime($_POST['champDateNaissance']));
                    $unAnimal->getPoids()->setPoids($_POST['champPoids']);
                    $unAnimal->setFamille(getFamilleById($_POST['champFamille']));
                    $unAnimal->setSexe(getSexeById($_POST['champSexe']));
                    
            
                
                    if(updateAnimal($unAnimal)){
                        header('Location: ?page=animaux&action=list');
                    }else{
                        $message = "Erreur d'enregistrement";
                    }
                }
                $lesFamilles = getAllFamilles();
                $lesSexes = getAllSexes();
                require_once "includes/core/views/formModifAnimal.phtml";
                
            }else{
                header('Location: index.php?page=connexion&action=connexion');
                exit();
            } 
            break;  
		}
		case 'delete':{
            
            require_once "includes/core/models/daoAnimaux.php";
            require_once "includes/core/models/daoFamille.php";
            require_once "includes/core/models/daoSexe.php";
            require_once "includes/core/models/daoPoids.php";
            
            $unAnimal = getAnimalById($_GET['id']);
            
            if(deleteAnimal($unAnimal)){
                header('Location: ?page=animaux&action=list');
            }else{
                $message = "Erreur d'enregistrement";
            }
            break;
		}
        case 'add' :{
            //Ajout d'un animal
            require_once "includes/core/models/daoAnimaux.php";
            require_once "includes/core/models/daoFamille.php";
            require_once "includes/core/models/daoSexe.php";
            require_once "includes/core/models/daoPoids.php";

            if(isset($_SESSION['mail'])){
                if(empty($_POST)){
                        
                        $unAnimal = new animaux();
                }else{
                    //je viens de valider le form cliqué sur submit

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
                }else {
                    header('Location: index.php?page=connexion&action=connexion');
                    exit();
                }
            break;
        }
        default:{
            
        }
    }