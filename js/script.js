document.addEventListener('DOMContentLoaded', () => {
  const messageValeur = document.querySelector('.information').children[1];
  let nom = '', prenom = '', adresse = '', valeur = 'Aucune valeur';

  const qr = new QRious({
    element: document.querySelector('.qrious'),
    size: 400,
    value: valeur,
  });

  function updateQRCode() {
    valeur = `- Nom : ${nom} - Prenom : ${prenom} - Adresse : ${adresse}`;
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
