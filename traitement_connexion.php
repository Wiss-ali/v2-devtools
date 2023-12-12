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

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];

    if($pseudo != "" && $mdp != ""){

        //connexion a la bdd
        $req = $bdd->query("SELECT * FROM users WHERE pseudo= '$pseudo' AND mdp= '$mdp'");
        $rep = $req->fetch();

        if($rep['id'] != false){
            echo "vous etes connecté !";
        }
        else
        {
            $error_msg = "pseudo ou mdp incorrect !";
        }
    }
}
?>