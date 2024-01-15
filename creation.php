<?php
require('./database/database.php');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['submit'])) {
        $nom = $_POST['Nom'];
        $prenom = $_POST['Prenom'];
        $email = $_POST['email'];
        $id_itilisateur = 1;
        $telephone = $_POST['Numero'];
        $adresse = $_POST['Adresse'];
        $entreprise = $_POST['entreprise'];
        $pays = $_POST['Pays'];
        $site = $_POST['Site'];
        $facebook = $_POST['facebook'];
        $instagram = $_POST['instagram'];
        $twitter = $_POST['twitter'];
        $stmt = $pdo->prepare("INSERT INTO qrinfo (id_utilisateur,nom, prenom, email, entreprise,telephone,Adresse,pays,site,facebook,instagram,twitter) VALUES (:id_utilisateur, :nom, :prenom, :email, :entreprise, :telephone, :Adresse, :pays, :site, :facebook, :instagram, :twitter)");
        
        $stmt->bindParam(':id_utilisateur', $id_itilisateur);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':entreprise', $entreprise);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':Adresse', $adresse);
        $stmt->bindParam(':pays', $pays);
        $stmt->bindParam(':site', $site);
        $stmt->bindParam(':facebook', $facebook);
        $stmt->bindParam(':instagram', $instagram);
        $stmt->bindParam(':twitter', $twitter);
        $stmt->execute();

        header('Location: index.php');
        exit();
    }else{
        echo "echec";
    }
} catch (PDOException $e) {
    echo "Erreur d'insertion : " . $e->getMessage();
}