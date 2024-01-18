<!DOCTYPE html>
<html lang="fr">
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit();
}
$id = $_SESSION['user_id'];
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

    $stmt = $pdo->prepare("SELECT * FROM qrinfo WHERE id_utilisateur='$id'");
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
        <li class="nav-item"><a href="index.php" class="nav-link text-white">QRcode</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>
      </ul>
    </header>
  </div>
  <div class="edit">
    <div class="doe" name="formulaire">

      <form action="creation.php" method="POST" name="form1">
        <?php
        if ($row) {
          echo '
          <div class="input-nom-prenom ">

           <div class="">
          

          <p class="titre mx-2">nom</p>
          <input id="nom" type="text" value="' . $row['nom'] . '" name="Nom" class=" form-control" oninput="change(this)" required>
      </div>
      <div class="">
          <p class="titre mx-2">Prenom</p>
          <input value="' . $row['prenom'] . '" type="text" name="Prenom" class="mx-2 form-control" oninput="change(this)" required>
      </div>
          </div>

          
      <div class="">
          <p class="titre mx-2">adresse</p>
          <input type="text" name="Adresse" value="' . $row['Adresse'] . '" class="form-control" oninput="change(this)"  required>
      </div>

      <div class="input-nom-prenom ">

      <div class="">
          <p class="titre mx-2">email</p>
          <input type="email" name="email" value="' . $row['email'] . '" class="form-control" oninput="change(this)"  required>
      </div>
      <div class="">
          <p class="titre mx-2">Numero</p>
          <input type="text" value="' . $row['telephone'] . '" name="Numero" class="mx-2 form-control" oninput="change(this)"  required>
      </div>
</div>


      <div class="">
          <p class="titre mx-2">Entreprise</p>
          <input type="text" value="' . $row['entreprise'] . '" name="entreprise" class="form-control" oninput="change(this)">
      </div>

      <div class="input-nom-prenom ">
      <div class="">
          <p class="titre mx-2">pays</p>
          <input type="Pays" value="' . $row['pays'] . '" name="Pays" class="form-control" oninput="change(this)"required>
      </div>
      <div class="">
          <p class="titre mx-2">site web</p>
          <input type="text" value="' . $row['site'] . '" name="Site" class="mx-2 form-control" oninput="change(this)" >
      </div>
          </div>


          <div class="input-nom-prenom m-2">    
      <div class="">
          <p class="titre mx-2">facebook</p>
          <input type="text" value="' . $row['facebook'] . '" name="facebook" class="pr-2 form-control" oninput="change(this)" >
      </div>
      <div class="">
          <p class="titre mx-2">twitter</p>
          <input type="text" value="' . $row['twitter'] . '" name="twitter" class=" form-control" oninput="change(this)" style="margin-left : 5px;" >
      </div>
      <div class="">
          <p class="titre mx-2">Instagram</p>
          <input type="text" value="' . $row['instagram'] . '" name="instagram" class="mx-2 form-control" oninput="change(this)" >
      </div>
      </div>
      
      <button type="submit" name="soumettre" class="mt-2 btn btn-primary">
          enregistrer QRCODE
      </button>
</div>
';
        }
        ?>

      </form>
      <!-- on commence a partir d'ici -->

    </div>

  </div>
</body>

</html>