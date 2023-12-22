<!DOCTYPE html>
<html lang="fr-fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion</title>
  <link rel="stylesheet" href="connexion.css">
</head>
<body>

  <form action="traitement_connexion.php" method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="mdp">Mot de passe:</label>
    <input type="password" id="mdp" name="mdp" required>

    <input type="submit" value="Se connecter" name="ok">
  </form>

</body>
</html>