<?php
// Démarrage de la session
session_start();

// Récupérer le token envoyé dans le formulaire et le token de la session
$token_envoye = $_POST['csrf_token'] ?? '';
$token_session = $_SESSION['csrf_token'] ?? '';

$nom = $_POST['nom'] ?? '';
$email = $_POST['email'] ?? '';

// 3. Vérifier si le token reçu correspond à celui stocké en session
if (empty($token_envoye) || empty($token_session) || $token_envoye !== $token_session) {
    // 4. Afficher un message d'erreur si le token est invalide
    // On peut rediriger vers form.php avec une erreur
    header("Location: form.php?erreur=" . urlencode("Erreur de sécurité : Le token CSRF est invalide ou manquant !"));
    exit();
}

// Si le token est valide : on peut régénérer un nouveau token pour la prochaine requête
unset($_SESSION['csrf_token']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 3 - Résultat Traitement</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; padding: 40px; }
        .box { background: white; max-width: 450px; margin: auto; padding: 25px; border-radius: 6px; box-shadow: 0 0 10px rgba(0,0,0,0.1); text-align: center; }
        .success { background: #d4edda; color: #155724; padding: 15px; border-radius: 4px; margin-bottom: 20px; font-weight: bold; }
        p { color: #333; font-size: 16px; margin: 10px 0; }
        a { display: inline-block; margin-top: 15px; color: #007bff; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

<div class="box">
    <div class="success">
        Succès : Le token CSRF est 100% valide !
    </div>

    <h3>Données reçues :</h3>
    <p><strong>Nom :</strong> <?php echo htmlspecialchars($nom); ?></p>
    <p><strong>Email :</strong> <?php echo htmlspecialchars($email); ?></p>

    <a href="form.php">Retourner au formulaire</a>
</div>

</body>
</html>
