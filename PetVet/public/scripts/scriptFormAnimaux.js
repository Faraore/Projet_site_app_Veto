let deleteButtons = document.querySelectorAll('.deleteAnimalBtn');
let idAnimal = 0;

// Ajoutez un gestionnaire d'événements pour le click sur le bouton de suppression
deleteButtons.forEach(element => {
    element.addEventListener('click', deleteFunction);
    idAnimal = element.getAttribute('form');
});


function deleteFunction(){
    if(confirm('Êtes-vous sûr de vouloir supprimer cet animal ?')){
        window.location.href='index.php?page=animaux&action=delete&id=' + idAnimal;

      };
}
