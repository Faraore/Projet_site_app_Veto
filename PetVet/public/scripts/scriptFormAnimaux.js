let deleteButtons = document.querySelectorAll('.deleteAnimalBtn');
let modifButtons = document.querySelectorAll('.modifAnimalBtn');

let idAnimal = 0;

// Ajoutez un gestionnaire d'événements pour le click sur le bouton de suppression
deleteButtons.forEach(element => {
    element.addEventListener('click', deleteFunction);
    
});
modifButtons.forEach(element => {
    element.addEventListener('click', modifFunction);
    
});

//affiche la fenetre de confirmation de suppression et renvoie vers la page qui gere la suppression 
function deleteFunction(){
    idAnimal = this.getAttribute('form');
    if(confirm('Êtes-vous sûr de vouloir supprimer cet animal ?')){
        window.location.href='index.php?page=animaux&action=delete&id=' + idAnimal;

      };
}

function modifFunction(){
    let idAnimal = this.getAttribute('form');
    
    window.location.href='index.php?page=animaux&action=edit&id=' + idAnimal;
}

