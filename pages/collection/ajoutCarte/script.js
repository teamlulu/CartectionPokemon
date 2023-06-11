// window.onload= function(){


// var btnPopup = document.getElementsByClassName('btnPopup');
// var overlay = document.getElementsByClassName('overlay');
// var btnClose = document.getElementsByClassName('btnClose');

// var nb = 0;
// var nb2 = 0;

// btnPopup.forEach(element => {
//     element.addEventListener('click', openModal(nb));
//     nb++;
// });

// btnClose.forEach(element => {
//     element.addEventListener('click', closePopup(nb2));
//     nb2++;
// });


// function openModal(nb){
//     overlay[nb].style.display = 'block';
// }

// function closePopup(nb2){
//     overlay[nb2].style.display = 'none';
// }
// } 

// Récupérez tous les boutons avec la classe "btnPopup"
const btnsPopup = document.querySelectorAll('.btnPopup');

// Parcourez tous les boutons et ajoutez un écouteur d'événements au clic
btnsPopup.forEach(btn => {
  btn.addEventListener('click', function() {
    // Récupérez l'id du bouton
    const idBtn = this.id;
    // Récupérez l'id de l'overlay correspondant
    const idOverlay = idBtn.replace('btnPopup', 'overlay');
    // Récupérez l'overlay correspondant
    const overlay = document.getElementById(idOverlay);
    // Affichez l'overlay
    overlay.style.display = 'block';
  });
});

// Parcourez tous les overlays et ajoutez un écouteur d'événements au clic sur le bouton "fermer"
const overlays = document.querySelectorAll('.overlay');
overlays.forEach(overlay => {
  const btnClose = overlay.querySelector('.btnClose');
  btnClose.addEventListener('click', function() {
    // Masquez l'overlay
    overlay.style.display = 'none';
  });
});