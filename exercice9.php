<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 9</title>
</head>
<body>
    <h2>Exercice 9 : Nombres pairs compris entre 0 et 100</h2>

    <h3>1. Avec la boucle for :</h3>
    <p>
    <?php
    for ($i = 0; $i <= 100; $i += 2) {
        echo $i . " ";
    }
    ?>
    </p>

    <h3>2. Avec la boucle while :</h3>
    <p>
    <?php
    $j = 0;
    while ($j <= 100) {
        echo $j . " ";
        $j += 2;
    }
    ?>
    </p>

    <h3>3. Avec la boucle do...while :</h3>
    <p>
    <?php
    $k = 0;
    do {
        echo $k . " ";
        $k += 2;
    } while ($k <= 100);
    ?>
    </p>
</body>
</html>
