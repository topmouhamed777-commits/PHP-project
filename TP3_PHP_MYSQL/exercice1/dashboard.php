<?php
// Démarrage de la session
session_start();

// Vérifier si l'utilisateur est bien connecté
if (!isset($_SESSION['user'])) {
    // Si pas connecté, redirection vers la page de connexion
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 1 - Tableau de bord</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f2f2f2; padding: 40px; }
        .box { background: white; max-width: 450px; margin: auto; padding: 30px; border-radius: 6px; text-align: center; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #28a745; }
        p { font-size: 18px; color: #444; }
        .btn-logout { display: inline-block; padding: 10px 20px; background: #dc3545; color: white; text-decoration: none; border-radius: 4px; font-weight: bold; margin-top: 15px; }
        .btn-logout:hover { background: #c82333; }
    </style>
</head>
<body>

<div class="box">
    <h2>Connexion Réussie !</h2>
    <p>Bienvenue sur votre espace, <strong><?php echo htmlspecialchars($_SESSION['user']); ?></strong> !</p>
    
    <!-- Bouton de déconnexion -->
    <a href="logout.php" class="btn-logout">Se déconnecter</a>
</div>

</body>
</html>
