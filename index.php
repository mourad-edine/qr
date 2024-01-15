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
//session_start();

/*if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}*/

require_once('./database/database.php');

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $pdo->prepare("SELECT * FROM utilisateur,qrinfo WHERE utilisateur.id = qrinfo.id AND utilisateur.id=1");
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
        <li class="nav-item"><a href="#" class="nav-link text-white">logout</a></li>
      </ul>
    </header>
  </div>
  <main class="main-container" style="margin-top: 80px;">

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
    <div class="">
      <div class="" name="">

        <form action="" method="POST" name="">
        

        </form>

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

            <div class="row">
              <div class="col-lg-4">
                <div class="card mb-4">
                  <div class="card-body text-center">
                    <div class="d-flex justify-content-center code_qr rounded-full">
                      <img class="qrious" style="width: 150px; height : 150px;margin-left : 135px">
                      <div class="information">
                      </div>
                    </div> <?php
                            if ($row) {
                              echo "

                                <div class='d-flex justify-content-center mb-2'>
                                    <a href='edit.php' class='btn btn-primary'>Modifier QRCODE</a>
                                </div>
                                  ";
                            }
                            ?>

                  </div>
                </div>

              </div>
              <div class="col-lg-8">
                <div class="card mb-4">
                  <?php
                  if ($row) {
                    echo '<div class="card-body">
                <div class="row">

                  <div class="col-sm-3">
                    <p class="mb-0">nom</p>

                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">' . $row['nom'] . '</p>
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">prenom</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">' . $row['prenom'] . '</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">' . $row['email'] . '</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Mobile</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">' . $row['password'] . '</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Addresse</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">Toamasina 501</p>
                  </div>
                </div>
              </div>';
                  }
                  ?>

                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="card mb-4 mb-md-0">
                      <div class="card-body">
                        <p class="mb-4"><span class="text-primary font-italic me-1">sites</span>
                        </p>
                        <p class="mb-1" style="font-size: .77rem;">https://edine.youpihost.fr/</p>

                      </div>
                    </div>
                    <?php
                    if ($row) {
                      echo '<button class="te btn btn-info text-white">
                    télécharger votre QRCODE
                  </button>';
                    } else {
                      echo '<button class="te btn btn-primary text-white">
                    créer un QRCODE 
                  </button>';
                    }
                    ?>

                  </div>

                  <div class="col-md-6">
                    <div class="card mb-4 mb-md-0">
                      <div class="card-body">
                        <p class="mb-4"><span class="text-primary font-italic me-1">réseaux sociaux</span>
                        </p>
                        <p class="mb-1" style="font-size: .77rem;">https://www.facebook.com/chams.edinemaulice</p>

                        <p class="mt-4 mb-1" style="font-size: .77rem;">https://twitter.com/MauliceE</p>

                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </main>
  <script src="./js/qrious.js"></script>
  <script src="./js/script.js"></script>
</body>

</html>