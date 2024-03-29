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

if(isset($_POST['ok'])){
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

    $testmail = $bdd->prepare("SELECT * FROM users Where email = ?");
    $testmail->execute(array($email));

    $controlmail = $testmail->rowCount();
    
    if ($controlmail==0) {
        $requete = $bdd->prepare("INSERT INTO users VALUES (0, :pseudo, :email, :mdp, '')");
        $requete->execute(
            array(
                "pseudo" => $pseudo,
                "email" => $email,
                "mdp" => $mdp,
            )
        );
        echo "Inscription réussie";
        
        // Redirection vers la page de connexion après une inscription réussie
        header("Location: connexion.php");
        // exit(); // Assure que le script se termine après la redirection
    } else {
        echo "Erreur : Adresse e-mail déjà prise frère";
    }
}
?>