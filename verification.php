<?php
require('./database/database.php');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['submit'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mot_de_passe = $_POST['mot_de_passe'];
        $stmt = $pdo->prepare("INSERT INTO utilisateur (nom, prenom, email, password) VALUES (:nom, :prenom, :email, :password)");

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $mot_de_passe);

        $stmt->execute();

        header('Location: register.php?message=insert_success');
        exit();
    }
} catch (PDOException $e) {
    echo "Erreur d'insertion : " . $e->getMessage();
}



try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = $_POST['mail'];
    $mot_de_passe = $_POST['passe'];

    $stmt = $pdo->prepare("SELECT id, nom, prenom FROM utilisateur WHERE email = :email AND password = :password");

    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $mot_de_passe);

    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_nom'] = $user['nom'];
        $_SESSION['user_prenom'] = $user['prenom'];
        header('Location: index.php'); 
        exit();
    } else {
        header('Location: login.php?message=incorrect');
    }
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}