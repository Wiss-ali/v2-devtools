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

if (isset($_POST['ok'])) {
    // Récupération des données du formulaire
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    //creation token//

    $token = bin2hex(random_bytes(20));

    // Requête préparée pour récupérer l'utilisateur associé à l'adresse e-mail
    $requete = $bdd->prepare("SELECT * FROM users WHERE email = ?");
    $requete->execute(array($email));

    // Récupération des résultats
    $user = $requete->fetch(PDO::FETCH_ASSOC);

    // Vérification du mot de passe avec password_verify
    if ($user && password_verify($mdp, $user['mdp'])) {
        
        $bdd->exec("UPDATE users SET token = '$token' WHERE email = '$email' AND mdp = '$mdp' ");
        setcookie("token", $token, time() + 7200);
        setcookie("email", $email, time() + 7200);

        // Affichage d'un message de réussite en cas de connexion réussie
        echo "Connexion réussie. Bienvenue, " . $user['pseudo'] . "!";
        // Vous pouvez rediriger l'utilisateur vers une page après la connexion si nécessaire
        header("location: client.php");
        exit();
    } else {
        // Affichage d'un message d'erreur en cas d'adresse e-mail ou de mot de passe incorrect
        echo "Erreur : Adresse e-mail ou mot de passe incorrect.";
    }
}
?>