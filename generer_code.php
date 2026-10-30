<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générateur de Code Aléatoire (Taille 15)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 40px 20px;
            display: flex;
            justify-content: center;
        }
        .container {
            background: #ffffff;
            max-width: 600px;
            width: 100%;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        h2 {
            color: #2c3e50;
            margin-bottom: 20px;
            text-align: center;
        }
        .card {
            background-color: #f8f9fa;
            border-left: 5px solid #1a73e8;
            padding: 15px 20px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .code-display {
            font-family: "Courier New", monospace;
            font-size: 24px;
            font-weight: bold;
            color: #1a73e8;
            letter-spacing: 2px;
            background-color: #e8f0fe;
            padding: 10px 15px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 8px;
        }
        .btn-reload {
            display: block;
            width: 100%;
            background-color: #1a73e8;
            color: white;
            text-align: center;
            padding: 12px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            margin-top: 20px;
            border: none;
            cursor: pointer;
        }
        .btn-reload:hover {
            background-color: #1558b0;
        }
        .explanation {
            font-size: 14px;
            color: #555;
            line-height: 1.5;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Générateur de Code Aléatoire de taille 15</h2>

    <?php
    /**
     * Méthode 1 (La plus simple) : Génère un code alphanumérique (chiffres et lettres)
     */
    function genererCodeAlphanumerique($taille = 15) {
        $caracteres = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $code = "";
        $longueurMax = strlen($caracteres) - 1;

        for ($i = 0; $i < $taille; $i++) {
            $index = rand(0, $longueurMax);
            $code .= $caracteres[$index];
        }

        return $code;
    }

    /**
     * Méthode 2 : Génère un code composé uniquement de chiffres
     */
    function genererCodeChiffres($taille = 15) {
        $code = "";
        for ($i = 0; $i < $taille; $i++) {
            $code .= rand(0, 9);
        }
        return $code;
    }

    // Génération des deux variantes pour taille = 15
    $codeAlphanum = genererCodeAlphanumerique(15);
    $codeNumerique = genererCodeChiffres(15);
    ?>

    <div class="card">
        <h3>1. Code Alphanumérique (Chiffres + Lettres) :</h3>
        <p>Taille : <strong>15 caractères</strong></p>
        <div class="code-display"><?php echo $codeAlphanum; ?></div>
    </div>

    <div class="card">
        <h3>2. Code Numérique (Chiffres uniquement) :</h3>
        <p>Taille : <strong>15 chiffres</strong></p>
        <div class="code-display"><?php echo $codeNumerique; ?></div>
    </div>

    <form method="get">
        <button type="submit" class="btn-reload">Générer un nouveau code</button>
    </form>

    <div class="explanation">
        <p><strong>Note :</strong> Ce script utilise la fonction <code>rand()</code> dans une boucle <code>for</code> qui tourne exactement 15 fois pour piocher un caractère aléatoire à chaque étape.</p>
    </div>
</div>

</body>
</html>
