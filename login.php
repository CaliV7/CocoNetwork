<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COCO NETWORK</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Leckerli+One&display=swap" rel="stylesheet">
</head>
<body>
    <h1>COCO NETWORK</h1> 
    <div>
        <h2>Connectez-vous pour nous partager vos idées et vos pensées !</h2>
    </div>
    <form method="POST" action="traitement_connexion.php">
        <label class="champ" for="username">Identifiant :</label>
                <input id="username" type="text" name="username" required>
                <br>

        <label class="champ" for="motdepasse">Mot de passe :</label>
            <input id="motdepasse" type="password" name="motdepasse" required>
            <br>

        <div class="foot">
            <button type="submit">Se connecter</button>
        </div>

        <div class = "footer">
            <p>
            Vous souhaitez nous rejoindre mais vous n'avez pas encore de compte : 
            </p>
            <a href="formsignin.php">Inscrivez-vous ici</a>
        </div>
    </form>
</body>
</html>