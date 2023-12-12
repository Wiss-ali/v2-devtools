<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
<form action="traitement_inscription.php" method="POST">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required>
    <br>

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" required>
    <br>

    <label for="pseudo">Pseudo :</label>
    <input type="text" id="pseudo" name="pseudo" required>
    <br>
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="mdp">Mot de passe :</label>
    <input type="password" id="mdp" name="mdp" required>
    <br>
    <input type="submit" name="btn-insc" value="inscription">
</form>

</body>
</html>