<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "utilisateurs";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "La connexion a échoué : " . $e->getMessage();
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