<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "utilisateurs";

try {
    // Connexion à la base de données
    $bdd = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Affichage d'un message de réussite en cas de connexion réussie
    //echo "Connexion réussie";//
} catch (PDOException $e) {
    // En cas d'échec de la connexion, affichage d'un message d'erreur
    echo "La connexion a échoué : " . $e->getMessage();
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