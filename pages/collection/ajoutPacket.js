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