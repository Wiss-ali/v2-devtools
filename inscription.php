<!DOCTYPE html>
<html lang="fr-fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire d'Inscription</title>
  <link rel="stylesheet" href="inscription.css">
</head>
<body>
  
  <form action="traitement.php" method="POST">
    <label for="pseudo">Pseudo:</label>
    <input type="text" id="pseudo" name="pseudo" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="mdp">Mot de passe:</label>
    <input type="password" id="mdp" name="mdp" required>

    <input type="submit" value="S'inscrire" name="ok">
  </form>

</body>
</html>
