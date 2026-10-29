<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice - Fonctions sur les Tableaux</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; line-height: 1.6; }
        .box { background: #f4f6f9; padding: 15px 20px; border-radius: 6px; margin-bottom: 20px; border-left: 4px solid #1a73e8; }
        code { background: #e0e0e0; padding: 2px 6px; border-radius: 4px; }
    </style>
</head>
<body>

    <h2>Exercice : Fonctions sur les Tableaux en PHP</h2>

    <?php
    // 1. Fonction remplir($n) : remplit un tableau de taille $n avec des nombres pairs aléatoires entre 1 et 30
    function remplir($n) {
        $tableau = [];
        while (count($tableau) < $n) {
            $nombre = rand(1, 30);
            if ($nombre % 2 == 0) { // Condition : valeur paire
                $tableau[] = $nombre;
            }
        }
        return $tableau;
    }

    // 2. Fonction somme($tableau) : retourne la somme des éléments du tableau
    function somme($tableau) {
        $total = 0;
        foreach ($tableau as $valeur) {
            $total += $valeur;
        }
        return $total;
    }

    // 3. Fonction trier($tableau) : trie les éléments par ordre croissant
    function trier($tableau) {
        sort($tableau); // Trie le tableau en ordre croissant
        return $tableau;
    }

    // --- TEST PRATIQUE ---
    $n = 8; // Exemple : tableau de 8 éléments

    // 1. Remplissage
    $tab = remplir($n);
    ?>

    <div class="box">
        <h3>1. Tableau généré aléatoirement (taille <?php echo $n; ?>) :</h3>
        <p><strong>[ <?php echo implode(", ", $tab); ?> ]</strong></p>
    </div>

    <div class="box">
        <h3>2. Somme des éléments du tableau :</h3>
        <?php $resultatSomme = somme($tab); ?>
        <p>La somme de tous les éléments est : <strong><?php echo $resultatSomme; ?></strong></p>
    </div>

    <div class="box">
        <h3>3. Tableau après le tri croissant :</h3>
        <?php $tabTrie = trier($tab); ?>
        <p><strong>[ <?php echo implode(", ", $tabTrie); ?> ]</strong></p>
    </div>

</body>
</html>
