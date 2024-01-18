<!-- Suppression des balises PHP non utilisées et ajout de commentaires -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/formulaire.css">
    <link rel="stylesheet" href="./css/feuille.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
</head>
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
$id = $_SESSION['user_id'];
require_once('./database/database.php');

?>

<body>
    <!-- Suppression des balises PHP non utilisées -->
    <div class="w-full">
        <header
            class="hi fixed-top d-flex justify-content-center flex-wrap  py-3 mb-4 border-bottom  shadow-lg">
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
                <div class="input-nom-prenom ">
                    <div>
                        <p class="titre">nom</p>
                        <input type="text" value="" name="Nom" class="form-control" oninput="change(this)" required>
                    </div>
                    <div>
                        <p class="titre">Prenom</p>
                        <input value="" type="text" name="Prenom" class="form-control" oninput="change(this)"
                            required>
                    </div>
                </div>
                <div>
                    <p class="titre">adresse</p>
                    <input type="text" name="Adresse" class="form-control" oninput="change(this)" required>
                </div>
                <div class="input-nom-prenom">
                    <div>
                        <p class="titre">email</p>
                        <input type="email" name="email" class="form-control" oninput="change(this)" required>
                    </div>
                    <div>
                        <p class="titre">Numero</p>
                        <input type="text" name="Numero" class="form-control" oninput="change(this)" required>
                    </div>
                </div>
                <div>
                    <p class="titre">Entreprise</p>
                    <input type="text" name="entreprise" class="form-control" oninput="change(this)">
                </div>
                <div class="input-nom-prenom">
                    <div>
                        <p class="titre">pays</p>
                        <input type="Pays" name="Pays" class="form-control" oninput="change(this)" required>
                    </div>
                    <div>
                        <p class="titre">site web</p>
                        <input type="text" name="Site" class="form-control" oninput="change(this)" required>
                    </div>
                </div>
                <div class="input-nom-prenom">
                    <div>
                        <p class="titre">facebook</p>
                        <input type="text" name="facebook" class="form-control" oninput="change(this)">
                    </div>
                    <div>
                        <p class="titre">twitter</p>
                        <input type="text" name="twitter" class="form-control" oninput="change(this)">
                    </div>
                    <div>
                        <p class="titre">Instagram</p>
                        <input type="text" name="instagram" class="form-control" oninput="change(this)">
                    </div>
                </div>
                <button type="submit" name="submit" class="mt-2 btn btn-primary">
                    enregistrer QRCODE
                </button>
            </form>
        </div>
        <!-- on commence a partir d'ici -->
    </div>
    </div>
    <script src="./js/qrious.js"></script>
    <script src="./js/script.js"></script>
</body>
</html>
