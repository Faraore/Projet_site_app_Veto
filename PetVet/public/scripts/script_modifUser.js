'use strict';
//import
import Inscription from './inscription.js';
// les variables
let btnModifUser;

function weModify(event){
   
    //on recupere les inputs du form
    let inputs = document.querySelectorAll('input');

    //on suprime les span si champ ok
    let span = document.querySelectorAll('span');
    if(span.length != 0)
    {
       for(let i =0;i<inputs.length;i++)
        {
            span[i].remove();
        }
}

    // envoyer les inputs vert la classe Inscription.js
    //elle permet de verifier les valeur saisies dans les input
    let inscription = new Inscription();
    inscription.getInputs(inputs);

    //appel aux getters
    if(inscription.champNom == "" || inscription.champPrenom == "" || inscription.champEmail == "" || inscription.champNumAdresse == ""|| inscription.champNomAdresse == "" || inscription.champCodePostal == "" || inscription.champVille == "")
    {
        console.log(inscription.champNom);
        console.log(inscription.champPrenom);
        console.log(inscription.champEmail);
        console.log(inscription.champNumAdresse);
        console.log(inscription.champNomAdresse);
        console.log(inscription.champCodePostal);
        console.log(inscription.champVille);


        event.preventDefault();
    }else{
        let form = document.querySelector('form');
        let formData = new FormData(form);
        fetch('includes/core/controllers/connexion_controller.php', {
            method: 'POST',
            body: formData
          })
            .then(response => response.text())
            .then(data => {
              // Traiter la réponse du script PHP si nécessaire
              console.log(data);
               // Afficher l'alerte d'inscription réussie
             alert("Vous êtes bien modifier vos informations !");
            })
            .catch(error => {
                // Gérer les erreurs de la requête AJAX
                console.error(error);
              });
    }
}

// code principal
document.addEventListener("DOMContentLoaded", function ()
{
    btnModifUser = document.getElementById("btnModifUser");

    btnModifUser.addEventListener("click",weModify);
    
    
})