var message_valeur = document.querySelector(".information").children[1];
var Prenom, Nom, Matricule, email, dateNaissance, Genre, Numero, Password;
var valeur;
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
    case "nom":
      Nom = element.value;
      break;
    case "prenom":
      Prenom = element.value;
      break;
    case "adresse":
      Adresse = element.value;
      break;
    case "numero":
      Numero = element.value;
      break;
    case "email":
      email = element.value;
      break;
    case "entreprise":
      Entreprise = element.value;
      break;
    case "reseaux":
      Reseaux = element.value;

      break;
    case "pays":
      Pays = element.value;
      break;

    case "site":
        Site = element.value;
        break;
  }

  valeur =
    "nom : " +
    Prenom +
    "- prenom : " +
    Nom +
    "- Adresse : " +
    Adresse +
    "- numero : " +
    Numero +
    "- Email : " +
    email +
    "- pays : " +
    pays +
    "- Reseaux sociaux : " +
    Reseaux +
    "- Nom entreprise : " +
    Entreprise
    "- Site Web : " +
    Site;
  qr.value = valeur;
  message_valeur.innerHTML = qr.value;
}

const downloadButton = document.querySelector(".te");

downloadButton.addEventListener("click", () => {
  const qrCodeImage = document.querySelector(".qrious");

  const downloadLink = document.createElement("a");

  const qrCodeImageUrl = qrCodeImage.src;

  downloadLink.href = qrCodeImageUrl;
  downloadLink.download = "qrcode.png"; // Nom du fichier à télécharger

  document.body.appendChild(downloadLink);
  downloadLink.click();

  // Suppression du lien de téléchargement de la page
  document.body.removeChild(downloadLink);
});
