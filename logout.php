<?php
// Initialiser la session
session_start();

// Détruire toutes les données de session
session_destroy();

// Rediriger vers la page de connexion (ou toute autre page de votre choix)
header('Location: login.php');
exit();
?>
