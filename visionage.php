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
require_once('./database/database.php');


if (isset($_GET["indice"])) {
    $indice = $_GET["indice"];
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT * FROM qrinfo WHERE indice='$indice'");
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



                <div class="row">
                    <div class="col-lg-4">
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
                                                    <p class="text-muted mb-0">' . $row['telephone'] . '</p>
                                                </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Addresse</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0">' . $row['Adresse'] . '</p>
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
                                        <?php

                                        if ($row) {
                                            echo ' <p class="mb-4"><span class="text-primary font-italic me-1">sites</span>
                                                            </p>
                                                            <a href="' . $row['site'] . '" class="mb-1" style="font-size: .77rem;">site</a>';
                                        } else {
                                            echo ' <p class="mb-4"><span class="text-primary font-italic me-1">simple et éfficace</span>';
                                        }
                                        ?>
                                    </div>

                                </div>
                                <?php
                                if ($row) {
                                    echo '';
                                } else {
                                    echo '<a href="creer.php" class="btn btn-primary text-white">
                                                        créer un QRCODE 
                                                  </a>';
                                }
                                ?>

                            </div>

                            <div class="col-md-6">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                    <?php
                                        if ($row) {
                                        echo '<p class="mb-4"><span class="text-primary font-italic me-1">réseaux sociaux</span></p>';

                                        if($row['facebook'] !==""){
                                            echo '<p><a href="' . $row['facebook'] . '" class="mb-1" style="font-size: .77rem;">facebook</a></p>';
                                        }
                                        if($row['twitter'] !==""){
                                            echo '<p><a href="' . $row['twitter'] . '" class="mb-1" style="font-size: .77rem;">Twitter</a></p>';
                                        }
                                        if($row['instagram'] !==""){
                                            echo '<p><a href="' . $row['instagram'] . '" class="mb-1" style="font-size: .77rem;">Twitter</a></p>';
                                        }
                                                        
                                        } else {
                                        echo '<p class="mb-4"><span class="text-primary font-italic me-1">créer votre propre QR code en appuyant sur le bouton en dessus</span>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        if ($row) {
                            echo '<a href="login.php" class="btn btn-info text-white mb-4">
                                                créer propre mon QRCODE
                                            </a>';
                        }
                        ?>


                    </div>
                </div>
            </div>

            <?php
            require_once('footer.php');



            ?>