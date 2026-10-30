<?php
// Démarrage de la session
session_start();

// Détruire les variables de session
session_unset();

// Détruire la session (comme demandé dans la consigne)
session_destroy();

// Rediriger vers la page du panier
header("Location: panier.php");
exit();
?>
