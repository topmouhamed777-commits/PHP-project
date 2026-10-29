<

    <?php
    if (isset($_POST['chiffre'])) {
        $chiffre = $_POST['chiffre'];

        echo "<h3>Détails pour le chiffre $chiffre :</h3>";
        switch ($chiffre) {
            case 1:
                echo "<p>Option 1 sélectionnée : Affichage de la page d'accueil.</p>";
                break;
            case 2:
                echo "<p>Option 2 sélectionnée : Consultation du catalogue des produits.</p>";
                break;
            case 3:
                echo "<p>Option 3 sélectionnée : Accès à votre profil utilisateur.</p>";
                break;
            case 4:
                echo "<p>Option 4 sélectionnée : Page de contact et support.</p>";
                break;
            default:
                echo "<p>Chiffre non reconnu.</p>";
                break;
        }
    }
    ?>
</body>
</html>
