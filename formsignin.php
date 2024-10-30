<!DOCTYPE html>
<html lang="fr">
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
    <h1>BIENVENUE SUR COCO NETWORK</h1>
    <h2> Veuillez remplir le formulaire d'inscription ci-dessous pour rejoindre notre super communauté de développeur !</h2><br>
    <div class="form">
        <div>
        <form method="POST" action="">
            <label class="champ" for="username">Identifiant :</label>
            <input id="username" type="text" name="username" required>
            <br>

            <label class="champ" for="prenom">Prénom :</label>
            <input id="prenom" type="text" name="prenom" required>
            <br>

            <label class="champ" for="nom">Nom :</label>
            <input id="nom" type="text" name="nom" required>
            <br>

            <label class="champ" for="birthdate">Date de naissance :</label>
            <input id="birthdate" type="date" name="birthdate" required>
            <br>

            <label class="champ" for="email">Email :</label>
            <input id="email" type="email" name="email" required>
            <br>

            <label class="champ" for="motdepasse">Mot de passe :</label>
            <input id="motdepasse" type="password" name="motdepasse" required>
            <br>

            <div class="foot">
                <button type="submit">S'inscrire</button>
            </div>
            <p>Déjà inscrit ? <a href="login.php"> Connectez-vous ici</a>
            </p>
        </form>

        </div>
        
    </div>
    
    <?php
    // Connexion à la base de données
    try {
        $dsn = "mysql:host=localhost;dbname=socialnetwork;charset=utf8";
        $user = "root";
        $password = "";
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur lors de l'inscription : " . $e->getMessage());
    }
    // Traitement du formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $birthdate = $_POST['birthdate'];
        $email = $_POST['email'];
        $motdepasse = $_POST['motdepasse'];
        
        // Hachage du mot de passe
        $hashed_password = password_hash($motdepasse, PASSWORD_DEFAULT);
        // Préparation de la requête d'insertion
        $stmt = $pdo->prepare("INSERT INTO user (username, lastname, firstname, birthdate, mail, password) VALUES (:username, :lastname, :firstname, :birthdate, :mail, :password)");
        // Lier les paramètres
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':lastname', $nom);
        $stmt->bindParam(':firstname', $prenom);
        $stmt->bindParam(':birthdate', $birthdate);
        $stmt->bindParam(':mail', $email);
        $stmt->bindParam(':password', $hashed_password);
        // Exécution de la requête
        try {
            $stmt->execute();
            echo "<p>Inscription réussie ! </p>";
        } catch (PDOException $e) {
            echo "<p>Erreur lors de l'inscription, veuillez réessayer." . $e->getMessage() . "</p>";
        }
    }
    // Fermer la connexion
    $pdo = null;
    ?>
</body>
</html>