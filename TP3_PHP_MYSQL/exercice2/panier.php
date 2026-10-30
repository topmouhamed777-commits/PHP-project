<?php
// Démarrage de la session
session_start();

$panier = $_SESSION['panier'] ?? [];
$total = 0;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 2 - Mon Panier</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f9f9f9; padding: 30px; }
        .container { max-width: 650px; margin: auto; background: white; padding: 25px; border-radius: 6px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #333; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background: #f2f2f2; }
        .btn-delete { color: #dc3545; text-decoration: none; font-weight: bold; }
        .btn-delete:hover { text-decoration: underline; }
        .actions { margin-top: 25px; display: flex; justify-content: space-between; align-items: center; }
        .btn-retour { padding: 8px 15px; background: #6c757d; color: white; text-decoration: none; border-radius: 4px; }
        .btn-vider { padding: 8px 15px; background: #dc3545; color: white; text-decoration: none; border-radius: 4px; font-weight: bold; }
        .btn-vider:hover { background: #c82333; }
        .empty { text-align: center; color: #777; padding: 30px; font-style: italic; }
        .total-box { margin-top: 20px; text-align: right; font-size: 18px; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h2>Mon Panier</h2>

    <?php if (empty($panier)): ?>
        <p class="empty">Votre panier est actuellement vide.</p>
        <div class="actions">
            <a href="index.php" class="btn-retour">Continuer les achats</a>
        </div>
    <?php else: ?>
        <table>
            <tr>
                <th>#</th>
                <th>Nom du produit</th>
                <th>Prix</th>
                <th>Action</th>
            </tr>
            <?php foreach ($panier as $index => $item): ?>
                <?php $total += $item['prix']; ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo htmlspecialchars($item['nom']); ?></td>
                    <td><?php echo number_format($item['prix'], 0, ',', ' '); ?> FCFA</td>
                    <td>
                        <a href="supprimer.php?index=<?php echo $index; ?>" class="btn-delete" onclick="return confirm('Voulez-vous supprimer ce produit ?');">
                            Supprimer
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div class="total-box">
            Montant Total : <?php echo number_format($total, 0, ',', ' '); ?> FCFA
        </div>

        <div class="actions">
            <a href="index.php" class="btn-retour">Ajouter d'autres produits</a>
            <a href="vider.php" class="btn-vider" onclick="return confirm('Êtes-vous sûr de vouloir vider le panier ?');">
                Vider le panier
            </a>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
