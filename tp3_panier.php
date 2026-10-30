<?php
session_start();

// Initialisation du panier en session s'il n'existe pas encore
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// Variables pour les messages
$messageErreur = "";
$messageSucces = "";
$quitte = false;

// ====================================================================
// FONCTIONS DE CONTRÔLE ET DE GESTION DU PANIER (TP 3)
// ====================================================================

/**
 * 1. Contrôle des données saisies dans le formulaire
 */
function validerChamps($nom, $prix, $quantite) {
    if (empty($nom)) {
        return "Le nom du produit est obligatoire.";
    }
    if (!is_numeric($prix) || $prix <= 0) {
        return "Le prix doit être un nombre positif supérieur à 0.";
    }
    if (!is_numeric($quantite) || $quantite <= 0 || intval($quantite) != $quantite) {
        return "La quantité doit être un nombre entier positif.";
    }
    return true; // Tout est valide
}

/**
 * 2. Contrôle de la limite de 5 produits maximum
 */
function peutAjouter($panier) {
    return count($panier) < 5;
}

/**
 * 3. Enregistrement d'un produit dans le panier (Session)
 */
function ajouterProduit(&$panier, $nom, $prix, $quantite) {
    $panier[] = [
        'nom'      => htmlspecialchars(trim($nom)),
        'prix'     => floatval($prix),
        'quantite' => intval($quantite),
        'total'    => floatval($prix) * intval($quantite)
    ];
}

/**
 * 4. Calcul du montant total brut du panier
 */
function calculerTotalBrut($panier) {
    $total = 0;
    foreach ($panier as $produit) {
        $total += $produit['total'];
    }
    return $total;
}

/**
 * 5. Calcul de la réduction de 2% si montant > 25000 FCFA
 */
function calculerReduction($totalBrut) {
    if ($totalBrut > 25000) {
        return $totalBrut * 0.02; // 2% de réduction
    }
    return 0;
}

/**
 * 6. Calcul du montant final net à payer
 */
function calculerNetAPayer($totalBrut, $reduction) {
    return $totalBrut - $reduction;
}

/**
 * 7. Vider le panier
 */
function viderPanier() {
    $_SESSION['panier'] = [];
}

/**
 * 8. Quitter l'application et détruire la session
 */
function quitterApplication() {
    $_SESSION = [];
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
}

// ====================================================================
// TRAITEMENT DES ACTIONS UTILISATEUR
// ====================================================================

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    // Action 1 : Ajouter un produit
    if ($action === 'ajouter') {
        if (!peutAjouter($_SESSION['panier'])) {
            $messageErreur = "Limite atteinte : Vous ne pouvez pas ajouter plus de 5 produits dans le panier.";
        } else {
            $nom = $_POST['nom'] ?? '';
            $prix = $_POST['prix'] ?? '';
            $quantite = $_POST['quantite'] ?? '';

            $validation = validerChamps($nom, $prix, $quantite);
            if ($validation === true) {
                ajouterProduit($_SESSION['panier'], $nom, $prix, $quantite);
                $messageSucces = "Produit « " . htmlspecialchars($nom) . " » ajouté avec succès !";
            } else {
                $messageErreur = $validation;
            }
        }
    }

    // Action 2 : Vider le panier
    elseif ($action === 'vider') {
        viderPanier();
        $messageSucces = "Le panier a été vidé avec succès.";
    }

    // Action 3 : Quitter
    elseif ($action === 'quitter') {
        quitterApplication();
        $quitte = true;
    }
}

// Calculs actuels du panier
$panier = $_SESSION['panier'] ?? [];
$nbProduits = count($panier);
$totalBrut = calculerTotalBrut($panier);
$reduction = calculerReduction($totalBrut);
$netAPayer = calculerNetAPayer($totalBrut, $reduction);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP 3 : Mini-Application Panier d'Achat</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        body {
            background-color: #f0f2f5;
            padding: 30px 15px;
            color: #333;
        }
        .container {
            max-width: 900px;
            margin: auto;
        }
        .header-title {
            text-align: center;
            margin-bottom: 25px;
        }
        .header-title h1 {
            color: #1a73e8;
            font-size: 26px;
            margin-bottom: 6px;
        }
        .header-title p {
            color: #666;
            font-size: 14px;
        }
        .grid {
            display: grid;
            grid-template-columns: 1fr 1.4fr;
            gap: 20px;
        }
        @media (max-width: 768px) {
            .grid {
                grid-template-columns: 1fr;
            }
        }
        .card {
            background: white;
            padding: 22px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }
        .card h2 {
            font-size: 18px;
            color: #2c3e50;
            margin-bottom: 15px;
            border-bottom: 2px solid #f0f2f5;
            padding-bottom: 8px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-size: 13px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        input:focus {
            border-color: #1a73e8;
            outline: none;
        }
        .btn {
            display: inline-block;
            width: 100%;
            padding: 11px;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            transition: 0.2s;
        }
        .btn-primary {
            background-color: #1a73e8;
            color: white;
        }
        .btn-primary:hover:not(:disabled) {
            background-color: #1558b0;
        }
        .btn-primary:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .btn-danger:hover {
            background-color: #bd2130;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #545b62;
        }
        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        .alert {
            padding: 12px 15px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 14px;
        }
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-info {
            background-color: #cce5ff;
            color: #004085;
            border: 1px solid #b8daff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 14px;
        }
        th, td {
            padding: 10px 8px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }
        th {
            background-color: #f8f9fa;
            color: #555;
        }
        td.text-right, th.text-right {
            text-align: right;
        }
        .totaux-box {
            background: #f8f9fa;
            border-radius: 6px;
            padding: 15px;
            margin-top: 15px;
        }
        .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 14px;
        }
        .total-final {
            font-size: 17px;
            font-weight: bold;
            color: #1a73e8;
            border-top: 1px solid #ddd;
            padding-top: 8px;
            margin-top: 8px;
        }
        .badge-promo {
            background: #28a745;
            color: white;
            font-size: 11px;
            padding: 2px 6px;
            border-radius: 4px;
            margin-left: 5px;
        }
        .empty-cart {
            text-align: center;
            color: #777;
            padding: 30px 10px;
            font-style: italic;
        }
        .badge-count {
            float: right;
            background: #e8f0fe;
            color: #1a73e8;
            font-size: 12px;
            padding: 3px 8px;
            border-radius: 12px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header-title">
        <h1>TP 3 : Panier d'Achat</h1>
        <p>Dr. Birane Koundoul - UAD 2025-2026 | Tableaux, formulaires, fonctions et sessions</p>
    </div>

    <?php if ($quitte): ?>
        <div class="card" style="text-align: center; padding: 40px;">
            <div class="alert alert-info">
                Vous avez quitté l'application avec succès. La session a été fermée.
            </div>
            <a href="tp3_panier.php" class="btn btn-primary" style="display: inline-block; width: auto; padding: 12px 30px;">
                Recommencer une nouvelle session
            </a>
        </div>
    <?php else: ?>

        <!-- Messages -->
        <?php if (!empty($messageErreur)): ?>
            <div class="alert alert-error"><?php echo $messageErreur; ?></div>
        <?php endif; ?>

        <?php if (!empty($messageSucces)): ?>
            <div class="alert alert-success"><?php echo $messageSucces; ?></div>
        <?php endif; ?>

        <div class="grid">
            <!-- COLONNE GAUCHE : Formulaire d'ajout -->
            <div class="card">
                <h2>
                    Ajouter un produit
                    <span class="badge-count"><?php echo $nbProduits; ?> / 5 produits</span>
                </h2>

                <?php if ($nbProduits >= 5): ?>
                    <div class="alert alert-error">
                        <strong>Limite atteinte !</strong> Vous avez atteint le maximum de 5 produits.
                    </div>
                <?php endif; ?>

                <form method="POST" action="tp3_panier.php">
                    <input type="hidden" name="action" value="ajouter">

                    <div class="form-group">
                        <label for="nom">Nom du produit :</label>
                        <input type="text" id="nom" name="nom" placeholder="Ex: Ordinateur, Clavier..." <?php echo ($nbProduits >= 5) ? 'disabled' : ''; ?> required>
                    </div>

                    <div class="form-group">
                        <label for="prix">Prix unitaire (FCFA) :</label>
                        <input type="number" id="prix" name="prix" min="1" step="any" placeholder="Ex: 15000" <?php echo ($nbProduits >= 5) ? 'disabled' : ''; ?> required>
                    </div>

                    <div class="form-group">
                        <label for="quantite">Quantité :</label>
                        <input type="number" id="quantite" name="quantite" min="1" value="1" <?php echo ($nbProduits >= 5) ? 'disabled' : ''; ?> required>
                    </div>

                    <button type="submit" class="btn btn-primary" <?php echo ($nbProduits >= 5) ? 'disabled' : ''; ?>>
                        Ajouter au panier
                    </button>
                </form>

                <!-- Boutons d'action : Vider et Quitter -->
                <div class="btn-group">
                    <form method="POST" action="tp3_panier.php" style="flex: 1;" onsubmit="return confirm('Êtes-vous sûr de vouloir vider le panier ?');">
                        <input type="hidden" name="action" value="vider">
                        <button type="submit" class="btn btn-danger" <?php echo ($nbProduits === 0) ? 'disabled style="background:#ccc;cursor:not-allowed;"' : ''; ?>>
                            Vider le panier
                        </button>
                    </form>

                    <form method="POST" action="tp3_panier.php" style="flex: 1;" onsubmit="return confirm('Voulez-vous vraiment quitter l\'application ?');">
                        <input type="hidden" name="action" value="quitter">
                        <button type="submit" class="btn btn-secondary">
                            Quitter
                        </button>
                    </form>
                </div>
            </div>

            <!-- COLONNE DROITE : Tableau des produits et Calculs -->
            <div class="card">
                <h2>Contenu du panier</h2>

                <?php if ($nbProduits === 0): ?>
                    <p class="empty-cart">Votre panier est actuellement vide.<br>Ajoutez des produits via le formulaire à gauche.</p>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Produit</th>
                                <th class="text-right">Prix</th>
                                <th class="text-right">Qté</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($panier as $index => $item): ?>
                                <tr>
                                    <td><?php echo $index + 1; ?></td>
                                    <td><strong><?php echo $item['nom']; ?></strong></td>
                                    <td class="text-right"><?php echo number_format($item['prix'], 0, ',', ' '); ?> F</td>
                                    <td class="text-right"><?php echo $item['quantite']; ?></td>
                                    <td class="text-right"><?php echo number_format($item['total'], 0, ',', ' '); ?> F</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- Zone des Totaux et Réductions -->
                    <div class="totaux-box">
                        <div class="total-row">
                            <span>Total Brut :</span>
                            <strong><?php echo number_format($totalBrut, 0, ',', ' '); ?> FCFA</strong>
                        </div>

                        <div class="total-row" style="color: <?php echo ($reduction > 0) ? '#28a745' : '#777'; ?>;">
                            <span>
                                Réduction (2%) :
                                <?php if ($reduction > 0): ?>
                                    <span class="badge-promo">- 2% appliquée (> 25 000 F)</span>
                                <?php else: ?>
                                    <small style="color:#888;">(applicable dès 25 000 F)</small>
                                <?php endif; ?>
                            </span>
                            <strong>- <?php echo number_format($reduction, 0, ',', ' '); ?> FCFA</strong>
                        </div>

                        <div class="total-row total-final">
                            <span>Montant Net à Payer :</span>
                            <span><?php echo number_format($netAPayer, 0, ',', ' '); ?> FCFA</span>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    <?php endif; ?>

</div>

</body>
</html>
