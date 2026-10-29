<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 11</title>
    <style>
        pre {
            font-family: monospace;
            font-size: 18px;
            line-height: 1.2;
        }
    </style>
</head>
<body>
    <h2>Exercice 11 : Dessin du cône du sapin (6 lignes)</h2>

    <pre>
<?php
for ($i = 1; $i <= 6; $i++) {
    // Boucle 1 : Espaces pour centrer
    for ($j = 1; $j <= (6 - $i); $j++) {
        echo " ";
    }
    // Boucle 2 : Étoiles (nombre impair : 1, 3, 5, 7, 9, 11)
    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }
    echo "\n";
}
?>
    </pre>
</body>
</html>
