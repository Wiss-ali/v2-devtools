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
    // echo "Connexion réussie";
} catch (PDOException $e) {
    // En cas d'erreur, affichage du message d'erreur
    echo "Erreur : " . $e->getMessage();
}

// Vérification de l'existence des cookies
if(isset($_COOKIE['email']) && isset($_COOKIE['token'])) {

    // Utilisation de requête préparée pour éviter les attaques par injection SQL
    $stmt = $bdd->prepare("SELECT * FROM users WHERE email = :email AND token = :token");
    $stmt->bindParam(':email', $_COOKIE['email']);
    $stmt->bindParam(':token', $_COOKIE['token']);
    $stmt->execute();

    // Récupération des résultats
    $rep = $stmt->fetch();

    // Vérification si une ligne a été retournée
    if ($rep) {
        // Affichage d'un message de bienvenue si la connexion est réussie
        echo "Vous êtes bien connecté, ".$rep['pseudo']." !";
        // Placez ici le code HTML pour les utilisateurs connectés
        // Fin de la page, pas besoin d'inclure le reste du code
        exit();


    } else {
        // Redirection vers la page de connexion si les cookies ne sont pas valides
        header("location: connexion.php");
    }

} else {
    // Redirection vers la page de connexion si les cookies ne sont pas présents
    header("location: connexion.php");
}

?>