<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 8</title>
</head>
<body>
    <h2>Exercice 8 : Moyenne des nombres de 1 à 10</h2>

    <h3>1. Avec la boucle for :</h3>
    <?php
    $sommeFor = 0;
    for ($i = 1; $i <= 10; $i++) {
        $sommeFor += $i;
    }
    $moyenneFor = $sommeFor / 10;
    echo "Somme = $sommeFor <br>";
    echo "Moyenne = $moyenneFor <br>";
    ?>

    <h3>2. Avec la boucle while :</h3>
    <?php
    $sommeWhile = 0;
    $j = 1;
    while ($j <= 10) {
        $sommeWhile += $j;
        $j++;
    }
    $moyenneWhile = $sommeWhile / 10;
    echo "Somme = $sommeWhile <br>";
    echo "Moyenne = $moyenneWhile <br>";
    ?>
</body>
</html>
