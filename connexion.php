<!DOCTYPE html>
<html lang="fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
<h1>salut je teste un formulaire ici</h1>
<h2>wsh celea bien ou quoi</h2>
<h3>c'est une page de merde la on s'en tape mais c'est en ligne</h3>
<form action="traitement.php" method="post">
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
    <button type="submit">S'inscrire</button>
</form>

</body>
</html>