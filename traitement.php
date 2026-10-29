<?php
// On vérifie que la page est bien appelée via la méthode POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    // Si l'utilisateur tente d'accéder directement à cette page, on le redirige
    header("Location: index.php?erreur=" . urlencode("Accès non autorisé. Veuillez remplir le formulaire."));
    exit();
}

// 1. Récupération et nettoyage des données
$prenom   = trim($_POST['prenom'] ?? '');
$nom      = trim($_POST['nom'] ?? '');
$email    = trim($_POST['email'] ?? '');
$pays     = trim($_POST['pays'] ?? '');
$sexe     = trim($_POST['sexe'] ?? '');
$interets = $_POST['interets'] ?? []; // Tableau des cases cochées

// 2. Vérification des règles de validation

// Règle 1 : Vérifier que le prénom est renseigné
if (empty($prenom)) {
    header("Location: index.php?erreur=" . urlencode("Le champ Prénom est obligatoire."));
    exit();
}

// Règle 2 : Vérifier que le nom est renseigné
if (empty($nom)) {
    header("Location: index.php?erreur=" . urlencode("Le champ Nom est obligatoire."));
    exit();
}

// Règle 3 : Vérifier que l'email est renseigné
if (empty($email)) {
    header("Location: index.php?erreur=" . urlencode("Le champ Email est obligatoire."));
    exit();
}

// Règle 4 : Vérifier la validité du format de l'email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: index.php?erreur=" . urlencode("L'adresse email saisie n'est pas valide."));
    exit();
}

// Règle 5 : Vérifier qu'un pays a été sélectionné dans la liste déroulante
if (empty($pays)) {
    header("Location: index.php?erreur=" . urlencode("Veuillez choisir un pays dans la liste déroulante."));
    exit();
}

// Règle 6 : Vérifier que le sexe a été choisi
if (empty($sexe)) {
    header("Location: index.php?erreur=" . urlencode("Veuillez sélectionner votre sexe."));
    exit();
}

// Règle 7 : Vérifier qu'au moins une case à cocher a été cochée
if (empty($interets)) {
    header("Location: index.php?erreur=" . urlencode("Veuillez sélectionner au moins un centre d'intérêt."));
    exit();
}

// 3. Si toutes les règles sont respectées, on affiche le récapitulatif
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'inscription</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #f0f2f5;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
        }
        .card {
            background-color: #ffffff;
            width: 100%;
            max-width: 550px;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .badge-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 12px 15px;
            border-radius: 5px;
            margin-bottom: 25px;
            text-align: center;
            font-weight: bold;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }
        th, td {
            text-align: left;
            padding: 12px 10px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }
        th {
            color: #555;
            width: 40%;
        }
        td {
            color: #222;
            font-weight: 500;
        }
        .btn-retour {
            display: inline-block;
            text-align: center;
            width: 100%;
            padding: 12px;
            background-color: #1a73e8;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .btn-retour:hover {
            background-color: #1558b0;
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="badge-success">
            Données validées et enregistrées avec succès !
        </div>

        <h2>Récapitulatif des informations</h2>

        <table>
            <tr>
                <th>Prénom</th>
                <td><?php echo htmlspecialchars($prenom); ?></td>
            </tr>
            <tr>
                <th>Nom</th>
                <td><?php echo htmlspecialchars($nom); ?></td>
            </tr>
            <tr>
                <th>Adresse Email</th>
                <td><?php echo htmlspecialchars($email); ?></td>
            </tr>
            <tr>
                <th>Pays de résidence</th>
                <td><?php echo htmlspecialchars($pays); ?></td>
            </tr>
            <tr>
                <th>Sexe</th>
                <td><?php echo htmlspecialchars($sexe); ?></td>
            </tr>
            <tr>
                <th>Centres d'intérêt</th>
                <td>
                    <?php 
                    // Sécurisation et affichage des cases cochées
                    $interetsNettoyes = array_map('htmlspecialchars', $interets);
                    echo implode(', ', $interetsNettoyes); 
                    ?>
                </td>
            </tr>
        </table>

        <a href="index.php" class="btn-retour">Retourner au formulaire</a>
    </div>

</body>
</html>
