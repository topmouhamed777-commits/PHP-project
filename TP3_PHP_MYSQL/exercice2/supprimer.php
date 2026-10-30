<?php
// Démarrage de la session
session_start();

// Vérifier si l'index du produit à supprimer est présent
if (isset($_GET['index'])) {
    $index = (int) $_GET['index'];

    // Si le produit existe bien dans le panier
    if (isset($_SESSION['panier'][$index])) {
        // Supprimer le produit du tableau
        unset($_SESSION['panier'][$index]);

        // Réindexer le tableau pour garder des clés 0, 1, 2...
        $_SESSION['panier'] = array_values($_SESSION['panier']);
    }
}

// Rediriger vers la page du panier
header("Location: panier.php");
exit();
?>
