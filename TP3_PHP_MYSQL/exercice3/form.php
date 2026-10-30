<?php
// Démarrage de la session
session_start();

// 1. Générer un token unique au chargement et le stocker en session
// On utilise la fonction indiquée dans le TP : bin2hex(random_bytes(32))
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$token = $_SESSION['csrf_token'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 3 - Formulaire avec Token CSRF</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; padding: 40px; }
        .box { background: white; max-width: 450px; margin: auto; padding: 25px; border-radius: 6px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #333; text-align: center; }
        .info { background: #e8f4fd; color: #0c5460; padding: 10px; font-size: 13px; border-radius: 4px; margin-bottom: 15px; word-break: break-all; }
        input[type="text"], input[type="email"] { width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #28a745; color: white; border: none; font-size: 16px; cursor: pointer; border-radius: 4px; }
        button:hover { background: #218838; }
        .alert-error { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px; text-align: center; }
    </style>
</head>
<body>

<div class="box">
    <h2>Formulaire Sécurisé (CSRF)</h2>

    <?php if (isset($_GET['erreur'])): ?>
        <div class="alert-error">
            <?php echo htmlspecialchars($_GET['erreur']); ?>
        </div>
    <?php endif; ?>

    <div class="info">
        <strong>Token généré en session :</strong><br>
        <code><?php echo $token; ?></code>
    </div>

    <form method="POST" action="traitement.php">
        <!-- 2. Token sous forme de champ caché (hidden) -->
        <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">

        <label>Nom complet :</label>
        <input type="text" name="nom" placeholder="Ex: Mouhamed Top" required>

        <label>Email :</label>
        <input type="email" name="email" placeholder="Ex: exemple@uad.sn" required>

        <button type="submit">Envoyer les données</button>
    </form>
</div>

</body>
</html>
