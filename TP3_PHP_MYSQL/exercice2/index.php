<?php
// Démarrage de la session
session_start();

// Initialiser le panier en session s'il n'existe pas encore
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

$message = "";

// Liste simple de produits disponibles
$produits = [
    1 => ['nom' => 'Cahier 200 pages', 'prix' => 1200],
    2 => ['nom' => 'Stylo à bille', 'prix' => 200],
    3 => ['nom' => 'Sac à dos étudiant', 'prix' => 15000],
    4 => ['nom' => 'Clé USB 32 Go', 'prix' => 6000],
    5 => ['nom' => 'Calculatrice Scientifique', 'prix' => 12500]
];

// Vérifier si un produit est ajouté via le formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id_produit'])) {
    $id = (int) $_POST['id_produit'];
    if (isset($produits[$id])) {
        // Stocker le nom et le prix dans la session
        $_SESSION['panier'][] = [
            'nom' => $produits[$id]['nom'],
            'prix' => $produits[$id]['prix']
        ];
        $message = "Produit « " . $produits[$id]['nom'] . " » ajouté au panier !";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 2 - Liste des Produits</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f9f9f9; padding: 30px; }
        .container { max-width: 650px; margin: auto; background: white; padding: 25px; border-radius: 6px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #333; text-align: center; }
        .top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .btn-panier { padding: 8px 16px; background: #28a745; color: white; text-decoration: none; border-radius: 4px; font-weight: bold; }
        .btn-panier:hover { background: #218838; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background: #f2f2f2; }
        button { padding: 6px 12px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #0056b3; }
        .alert-success { background: #d4edda; color: #155724; padding: 10px; border-radius: 4px; margin-bottom: 15px; }
    </style>
</head>
<body>

<div class="container">
    <div class="top-bar">
        <h2>Boutique d'Informatique</h2>
        <a href="panier.php" class="btn-panier">
            Mon Panier (<?php echo count($_SESSION['panier']); ?>)
        </a>
    </div>

    <?php if (!empty($message)): ?>
        <div class="alert-success"><?php echo $message; ?></div>
    <?php endif; ?>

    <h3>Nos Produits</h3>
    <table>
        <tr>
            <th>Nom du produit</th>
            <th>Prix</th>
            <th>Action</th>
        </tr>
        <?php foreach ($produits as $id => $produit): ?>
            <tr>
                <td><?php echo $produit['nom']; ?></td>
                <td><?php echo number_format($produit['prix'], 0, ',', ' '); ?> FCFA</td>
                <td>
                    <form method="POST" action="index.php">
                        <input type="hidden" name="id_produit" value="<?php echo $id; ?>">
                        <button type="submit">Ajouter au panier</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>
