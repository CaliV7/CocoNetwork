<?php
session_start();

$host = 'localhost'; 
$dbname = 'socialnetwork'; 
$username = 'root'; 
$password = ''; 

try {
    $dsn = "mysql:host=localhost;dbname=socialnetwork;charset=utf8";
    $user = "root";
    $password = "";
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Récupération des données du formulaire
$email = $_POST['email'];
$motdepasse = $_POST['motdepasse'];

// Vérification des identifiants
$sql = "SELECT * FROM user WHERE mail = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute(['email' => $email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($motdepasse, $user['motdepasse'])) {
    // Connexion réussie
    $_SESSION['username'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    header("Location: accueil.php"); // Rediriger vers la page d'accueil
    exit;
} else {
    // Échec de la connexion
    $error = "Identifiants incorrects.";
    header("Location: connexion.php?error=" . urlencode($error));
    exit;
}
?>
