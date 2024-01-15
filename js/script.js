document.addEventListener('DOMContentLoaded', () => {
  const messageValeur = document.querySelector('.information').children[1];
  let nom = '', prenom = '',email="", adresse = '',pays ='',numero="",site="",facebook="",twitter="",instagram="",entreprise="",valeur = 'Aucune valeur';

  const qr = new QRious({
    element: document.querySelector('.qrious'),
    size: 400,
    value: valeur,
  });

  function updateQRCode() {
    valeur = `- Nom : ${nom} - Prenom : ${prenom} - Adresse : ${adresse} - Email : ${numero} - Pays : ${pays} - Site : ${site}- facebook : ${facebook} - twitter : ${twitter} - instagram : ${instagram}- email : ${email}- entreprise : ${entreprise}`;
    qr.value = valeur;
    messageValeur.innerHTML = qr.value;
  }

  function handleChange(element) {
    switch (element.name) {
      case 'Nom':
        nom = element.value;
        break;
      case 'Prenom':
        prenom = element.value;
        break;
      case 'Adresse':
        adresse = element.value;
        break
        case 'Numero':
        numero = element.value;
        break;
      case 'Site':
        site = element.value;
        break;
      case 'Pays':
        pays = element.value;
        break
      case 'facebook':
        facebook = element.value;
        break;
      case 'twitter':
          twitter = element.value;
          break;
      case 'instagram':
            instagram = element.value;
            break;    
      case 'email':
          email = element.value;
          break;
    }
    updateQRCode();
  }

  document.forms[0].addEventListener('input', (event) => {
    if (event.target.tagName === 'INPUT') {
      handleChange(event.target);
    }
  });

  const downloadButton = document.querySelector('.te');
  downloadButton.addEventListener('click', () => {
    const qrCodeImage = document.querySelector('.qrious');
    const downloadLink = document.createElement('a');
    const qrCodeImageUrl = qrCodeImage.src;

    downloadLink.href = qrCodeImageUrl;
    downloadLink.download = 'qrcode.png';
    document.body.appendChild(downloadLink);
    downloadLink.click();
    document.body.removeChild(downloadLink);
  });
});
