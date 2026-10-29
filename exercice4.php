

    <?php
    // Déclaration directe des deux nombres
    $a = 15;
    $b = 27;
    $somme = $a + $b;

    echo "<p>Premier nombre : $a</p>";
    echo "<p>Deuxième nombre : $b</p>";
    echo "<p><strong>La somme de $a et $b est : $somme</strong></p>";
    ?>

    <hr>
    <h3>Tester avec d'autres nombres :</h3>
    <form method="post">
        <label>Nombre 1 :</label>
        <input type="number" name="n1" required>
        <label>Nombre 2 :</label>
        <input type="number" name="n2" required>
        <button type="submit">Calculer</button>
    </form>

    <?php
    if (isset($_POST['n1']) && isset($_POST['n2'])) {
        $n1 = $_POST['n1'];
        $n2 = $_POST['n2'];
        $resultat = $n1 + $n2;
        echo "<p>Résultat : $n1 + $n2 = <strong>$resultat</strong></p>";
    }
    ?>
</body>
</html>
