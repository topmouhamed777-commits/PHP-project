

    <?php
    $age = 20; // Vous pouvez modifier la valeur de l'âge ici

    if ($age >= 18) {
        echo "<p>L'âge est de $age ans : la personne est <strong>majeure</strong>.</p>";
    } else {
        echo "<p>L'âge est de $age ans : la personne est <strong>mineure</strong>.</p>";
    }
    ?>

    <hr>
    <h3>Tester avec un autre âge :</h3>
    <form method="post">
        <label>Entrez un âge :</label>
        <input type="number" name="age" required min="0">
        <button type="submit">Vérifier</button>
    </form>

    <?php
    if (isset($_POST['age'])) {
        $ageSaisi = (int) $_POST['age'];
        if ($ageSaisi >= 18) {
            echo "<p>À $ageSaisi ans, la personne est <strong>majeure</strong>.</p>";
        } else {
            echo "<p>À $ageSaisi ans, la personne est <strong>mineure</strong>.</p>";
        }
    }
    ?>
</body>
</html>
