<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
   
</head>
<body>

    <div class="form-container">
        <h2>Formulaire d'inscription</h2>

        <?php
        // Affichage du message d'erreur s'il est présent dans l'URL
        if (isset($_GET['erreur'])) {
            echo '<div class="alert-error">' . htmlspecialchars($_GET['erreur']) . '</div>';
        }
        ?>

        <form action="traitement.php" method="POST">
            <!-- 1. Champ Prénom -->
            <div class="form-group">
                <label class="main-label" for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom">
            </div>

            <!-- 2. Champ Nom -->
            <div class="form-group">
                <label class="main-label" for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" placeholder="Entrez votre nom">
            </div>

            <!-- 3. Champ Email -->
            <div class="form-group">
                <label class="main-label" for="email">Adresse Email :</label>
                <input type="email" id="email" name="email" placeholder="exemple@domaine.com">
            </div>

            <!-- 4. Liste Déroulante -->
            <div class="form-group">
                <label class="main-label" for="pays">Pays de résidence :</label>
                <select id="pays" name="pays">
                    <option value="">-- Sélectionnez un pays --</option>
                    <option value="Sénégal">Sénégal</option>
                    <option value="France">France</option>
                    <option value="Canada">Canada</option>
                    <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                    <option value="Maroc">Maroc</option>
                </select>
            </div>

            <!-- 5. Le Sexe (Radio) -->
            <div class="form-group">
                <label class="main-label">Sexe :</label>
                <div class="radio-group">
                    <label class="radio-item">
                        <input type="radio" name="sexe" value="Homme"> Homme
                    </label>
                    <label class="radio-item">
                        <input type="radio" name="sexe" value="Femme"> Femme
                    </label>
                </div>
            </div>

            <!-- 6. Cinq Cases à Cocher (Checkbox) -->
            <div class="form-group">
                <label class="main-label">Centres d'intérêt (choisir au moins un) :</label>
                <div class="checkbox-group">
                    <label class="checkbox-item">
                        <input type="checkbox" name="interets[]" value="Informatique"> Informatique
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="interets[]" value="Sport"> Sport
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="interets[]" value="Musique"> Musique
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="interets[]" value="Lecture"> Lecture
                    </label>
                    <label class="checkbox-item">
                        <input type="checkbox" name="interets[]" value="Voyage"> Voyage
                    </label>
                </div>
            </div>

            <!-- Bouton de soumission -->
            <button type="submit">Envoyer</button>
        </form>
    </div>

</body>
</html>
