<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/formulaire.css">
  <link rel="stylesheet" href="./css/feuille.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
$id = $_SESSION['user_id'];
require_once('./database/database.php');

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $pdo->prepare("SELECT utilisateur.id as util,qrinfo.nom,qrinfo.prenom,qrinfo.email,qrinfo.telephone,qrinfo.Adresse,qrinfo.facebook,qrinfo.twitter,qrinfo.instagram,qrinfo.site,qrinfo.indice FROM utilisateur,qrinfo WHERE utilisateur.id = qrinfo.id_utilisateur AND utilisateur.id='$id'");

  //$stmt = $pdo->prepare("SELECT * FROM utilisateur,qrinfo WHERE utilisateur.id = qrinfo.id AND qrinfo.id_utilisateur='$id'");
  $stmt->execute();

  $row = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  die('Erreur : ' . $e->getMessage());
}
?>

<body>
  <div class="w-full">
    <header class="hi fixed-top d-flex justify-content-center flex-wrap  py-3 mb-4 border-bottom  shadow-lg">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-4 text-white p-2"><img src="./assets/qr.png" alt="" width="30" height="30"></span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="index.php" class="nav-link text-white">QRcode</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>
      </ul>
    </header>
  </div>
  <main class="main-container" style="margin-top: 80px;">
        <section class="mb-3" style="background-color: #eee;">
          <div class="container py-1">
            <div class="row">
              <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">utillisateur</a></li>
                    <li class="breadcrumb-item active" aria-current="page">profils</li>
                  </ol>
                </nav>
              </div>
            </div>









