<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
</head>
<body>
    
<form action="traitement_connexion.php" method="POST">

    <label for="pseudo">Pseudo :</label>
    <input type="text" id="pseudo" name="pseudo" required>

    <label for="mdp">Mot de passe :</label>
    <input type="password" id="mdp" name="mdp" required>

    <input type="submit" name="btn-conn" value="Se Connecter">
    
</form>
    
</body>
</html>