<!DOCTYPE html>
<html lang="fr">
<?php
/*session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
*/
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/formulaire.css">
  <link rel="stylesheet" href="./css/feuille.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <?php

  require_once('./database/database.php');

  try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE id=1");
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
  }
  ?>
  <div class="w-full">
    <header class="hi fixed-top d-flex justify-content-center flex-wrap  py-3 mb-4 border-bottom  shadow-lg">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-4 text-white p-2"><img src="./assets/qr.png" alt="" width="30" height="30"></span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="#" class="nav-link text-white">QRcode</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white">logout</a></li>
      </ul>
    </header>
  </div>
  <div class="corps">
    <div class="formulaire" name="formulaire">

      <form action="" method="POST" name="form1">
        <?php
        if ($row) {
          echo ' <div class="">
            <p class="titre">nom</p>
            <input type="text" value="'.$row['nom'].'" name="Nom" class="form-control" oninput="change(this)" pattern="^[0-9]{6}" required>
          </div>
          <div class="">
            <p class="titre">Prenom</p>
            <input value="'.$row['prenom'].'" type="text" name="Prenom" class="form-control" oninput="change(this)" pattern="^[0-9]{6}" required>
          </div>
          <div class="">
            <p class="titre">adresse</p>
            <input type="text" name="Adresse" class="form-control" oninput="change(this)" pattern="^[0-9]{6}" required>
          </div>
          <div class="">
            <p class="titre">Numero</p>
            <input type="text" name="Numero" class="form-control" oninput="change(this)" pattern="^[0-9]{6}" required>
          </div>
          <div class="">
            <p class="titre">pays</p>
            <input type="Pays" name="Pays" class="form-control" oninput="change(this)" pattern="^[0-9]{6}" required>
          </div>
          <div class="">
            <p class="titre">site web</p>
            <input type="text" name="Site" class="form-control" oninput="change(this)" pattern="^[0-9]{6}" required>
          </div>
          <div class="">
            <p class="titre">Reseaux sociaux</p>
            <input type="text" name="Reseaux" class="form-control" oninput="change(this)" pattern="^[0-9]{6}" required>
          </div>
      </div>';
        }
        ?>

      </form>
      <!-- on commence a partir d'ici -->
      <div class="code_qr">
        <img class="qrious">
        <div class="information">
          <button class="te btn btn-primary">
            enregistrer QRCODE
          </button>
        </div>
      </div>
    </div>

  </div>
  <script src="./js/qrious.js"></script>
  <script src="./js/script.js"></script>
</body>

</html>