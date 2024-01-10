var message_valeur = document.querySelector(".information").children[1];
var Prenom, Nom, Matricule, email, dateNaissance, Genre, Numero, Password;
var valeur;
//CECI NOUS PERMET DE SELECTIONNER LE 2 EME PARAGRAHPE DANS LA DIV AYANT LA CLASS INFORMATION
window.onload = () => {
  valeur = "Aucune valeur";
  message_valeur.innerHTML = valeur;
};
document.forms[0].onchange = () => {
  console.log("change");
};
var qr = new QRious({
  element: document.querySelector(".qrious"),
  size: 400,
  value: valeur,
});
function change(element) {
  switch (element.name) {
    case "Matricule":
      Matricule = element.value;
      break;
  }

  valeur =
    "- Matricule : " +
    Matricule
  qr.value = valeur;
  message_valeur.innerHTML = qr.value;
}

// ... Ton code JavaScript existant ...

// Sélection du bouton de téléchargement
const downloadButton = document.querySelector(".te");

// Ajout d'un gestionnaire d'événements sur le bouton de téléchargement
downloadButton.addEventListener("click", () => {
  // Sélection du QR code image
  const qrCodeImage = document.querySelector(".qrious");

  // Création d'un élément a pour le téléchargement
  const downloadLink = document.createElement("a");

  // Récupération de l'URL de l'image QR code
  const qrCodeImageUrl = qrCodeImage.src;

  // Définition des attributs pour le téléchargement
  downloadLink.href = qrCodeImageUrl;
  downloadLink.download = "qrcode.png"; // Nom du fichier à télécharger

  // Ajout du lien de téléchargement à la page et déclenchement du téléchargement
  document.body.appendChild(downloadLink);
  downloadLink.click();

  // Suppression du lien de téléchargement de la page
  document.body.removeChild(downloadLink);
});
