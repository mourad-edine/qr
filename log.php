<?php

require('./database/database.php');
session_start();
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
        header('Location: index.php'); 
        exit();
    } else {
        header('Location: login.php?message=incorrect');
    }
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}