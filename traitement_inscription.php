<?php
$servername = "127.0.0.1:3306";
$username = "u559440517_wissali";
$password = "Unmdpbien69";

try {
    // Création d'une nouvelle instance de la classe PDO pour la connexion à la base de données
    $bdd = new PDO("mysql:host=$servername;dbname=u559440517_utilisateurs", $username, $password);

    // Configuration pour afficher les erreurs PDO
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Message indiquant que la connexion a réussi
    echo "Connexion réussie";
} catch (PDOException $e) {
    // En cas d'erreur, affichage du message d'erreur
    echo "Erreur : " . $e->getMessage();
}

if (isset($_POST['btn-insc'])) {
    // Récupération des valeurs du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT); // Hachage du mot de passe

   
    echo "Insciption reussie !"
}
?>
