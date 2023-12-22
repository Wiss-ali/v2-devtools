<?php

// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$database = "utilisateurs";

try {
    // Connexion à la base de données avec PDO
    $bdd = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Affichage d'un message de réussite en cas de connexion réussie
    //echo "Connexion réussie";//
} catch (PDOException $e) {
    // En cas d'échec de la connexion, affichage d'un message d'erreur
    echo "La connexion a échoué : " . $e->getMessage();
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