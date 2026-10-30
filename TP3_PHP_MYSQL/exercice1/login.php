<?php
// Démarrage de la session
session_start();

$erreur = "";

// Identifiants par défaut (comme un élève en TP)
$utilisateur_valide = "etudiant";
$mot_de_passe_valide = "passer123";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Vérifier si les informations saisies sont correctes
    if ($username === $utilisateur_valide && $password === $mot_de_passe_valide) {
        // Enregistrer le nom de l'utilisateur dans la session
        $_SESSION['user'] = $username;
        // Rediriger vers la page dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        $erreur = "Nom d'utilisateur ou mot de passe incorrect !";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 1 - Connexion</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f2f2f2; padding: 40px; }
        .box { background: white; max-width: 350px; margin: auto; padding: 25px; border-radius: 6px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #333; }
        input[type="text"], input[type="password"] { width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #007bff; color: white; border: none; font-size: 16px; cursor: pointer; }
        button:hover { background: #0056b3; }
        .error { color: red; text-align: center; margin-bottom: 15px; }
        .info { background: #e7f3fe; color: #31708f; padding: 10px; font-size: 13px; margin-bottom: 15px; border-radius: 4px; }
    </style>
</head>
<body>

<div class="box">
    <h2>Connexion</h2>

    <div class="info">
        <strong>Identifiants de test :</strong><br>
        Utilisateur : <code>etudiant</code><br>
        Mot de passe : <code>passer123</code>
    </div>

    <?php if (!empty($erreur)): ?>
        <p class="error"><?php echo $erreur; ?></p>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <label>Nom d'utilisateur :</label>
        <input type="text" name="username" required>

        <label>Mot de passe :</label>
        <input type="password" name="password" required>

        <button type="submit">Se connecter</button>
    </form>
</div>

</body>
</html>
