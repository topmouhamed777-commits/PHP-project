<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP 3 PHP MYSQL - Dr. Koundoul (UAD 2024-2025)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 40px 20px;
            color: #333;
        }
        .container {
            max-width: 750px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        h1 {
            color: #1a73e8;
            font-size: 24px;
            text-align: center;
            margin-bottom: 5px;
        }
        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
            font-size: 15px;
        }
        .exercise-card {
            border: 1px solid #e1e4e8;
            border-left: 5px solid #1a73e8;
            border-radius: 6px;
            padding: 18px 20px;
            margin-bottom: 20px;
            background: #fafbfc;
        }
        .exercise-card h2 {
            font-size: 18px;
            margin-bottom: 8px;
            color: #2c3e50;
        }
        .exercise-card p {
            font-size: 14px;
            color: #555;
            margin-bottom: 12px;
            line-height: 1.5;
        }
        .files {
            font-size: 13px;
            color: #777;
            margin-bottom: 12px;
        }
        .btn {
            display: inline-block;
            background: #1a73e8;
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
        }
        .btn:hover {
            background: #1558b0;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>TP 3 : PHP MYSQL - Sessions & Sécurité</h1>
    <div class="subtitle">Dr. Koundoul - Année Académique 2024-2025 | UAD</div>

    <!-- Exercice 1 -->
    <div class="exercise-card">
        <h2>Exercice 1 : Connexion, Session & Déconnexion</h2>
        <p>Formulaire de connexion avec vérification, ouverture de session, affichage du message de bienvenue et bouton de déconnexion.</p>
        <div class="files"><strong>Fichiers :</strong> <code>login.php</code>, <code>dashboard.php</code>, <code>logout.php</code></div>
        <a href="exercice1/login.php" class="btn">Lancer l'Exercice 1 &rarr;</a>
    </div>

    <!-- Exercice 2 -->
    <div class="exercise-card">
        <h2>Exercice 2 : Gestion d'un Panier en Session</h2>
        <p>Affichage d'une liste de produits avec bouton d'ajout, stockage en session, page "Mon Panier", suppression d'un produit et bouton pour vider le panier.</p>
        <div class="files"><strong>Fichiers :</strong> <code>index.php</code>, <code>panier.php</code>, <code>supprimer.php</code>, <code>vider.php</code></div>
        <a href="exercice2/index.php" class="btn">Lancer l'Exercice 2 &rarr;</a>
    </div>

    <!-- Exercice 3 -->
    <div class="exercise-card">
        <h2>Exercice 3 : Protection contre les failles CSRF (Token)</h2>
        <p>Génération d'un jeton aléatoire unique avec <code>bin2hex(random_bytes(32))</code>, champ caché dans le formulaire et vérification sécurisée lors de la soumission.</p>
        <div class="files"><strong>Fichiers :</strong> <code>form.php</code>, <code>traitement.php</code></div>
        <a href="exercice3/form.php" class="btn">Lancer l'Exercice 3 &rarr;</a>
    </div>
</div>

</body>
</html>
