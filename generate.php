<?php

require "vendor/autoload.php";

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

// Fonction pour télécharger le QR code
function downloadQRCode($indice)
{
    if (empty($indice)) {
        echo "Le prénom est requis.";
        exit();
    }

    $combinedText = "http://localhost:8080/visionage.php?indice=$indice";

    $qrCode = new QrCode($combinedText);
    $writer = new PngWriter;
    $result = $writer->write($qrCode);

    header('Content-Type: image/png');
    header('Content-Disposition: attachment; filename="mon_qrcode.png"');

    echo $result->getString();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['png'])) {
    downloadQRCode($_POST["indice"]);
}
?>
