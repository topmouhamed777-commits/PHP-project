# Projets et Exercices PHP

Solutions des exercices de PHP (TP 1, fonctions, formulaires et validation de données).

## Contenu du projet

### Formulaire & Validation de données
- **[index.php](index.php)** : Formulaire d'inscription complet (prénom, nom, email, liste déroulante, sexe, 5 cases à cocher) avec affichage dynamique des erreurs.
- **[traitement.php](traitement.php)** : Traitement et validation sécurisée des données en POST avec redirection en cas d'erreur.

### Fonctions & Algorithmes
- **[fonctions_tableau.php](fonctions_tableau.php)** : Fonctions `remplir()` (génération de nombres pairs aléatoires), `somme()` et `trier()`.
- **[generer_code.php](generer_code.php)** : Génération d'un code aléatoire de taille 15 (chiffres et lettres).

### TP 3 PHP MYSQL : Sessions & Sécurité (Dr. Koundoul 2024-2025)
Dossier complet **[TP3_PHP_MYSQL/](TP3_PHP_MYSQL/index.php)** :
- **Exercice 1 (Connexion & Session)** :
  - `login.php` : Formulaire de connexion.
  - `dashboard.php` : Espace membre sécurisé avec message de bienvenue.
  - `logout.php` : Déconnexion et destruction de session.
- **Exercice 2 (Panier d'achat)** :
  - `index.php` : Liste des articles avec bouton "Ajouter au panier".
  - `panier.php` : Visualisation du panier et total.
  - `supprimer.php` : Suppression ciblée d'un produit.
  - `vider.php` : Vidage complet du panier.
- **Exercice 3 (Sécurité CSRF & Token)** :
  - `form.php` : Formulaire avec token aléatoire `bin2hex(random_bytes(32))`.
  - `traitement.php` : Vérification du token CSRF et validation.

### TP 3 : Tableaux, Formulaires, Fonctions et Sessions (2025-2026)
- **[tp3_panier.php](tp3_panier.php)** : Mini-application de panier d'achat en session (Dr. Birane Koundoul - UAD) :
  - Limitation à 5 produits maximum (gérée par fonction).
  - Réduction automatique de 2% si le total est supérieur à 25 000 FCFA.
  - Fonctions modulaires pour les contrôles, les calculs et la session.
  - Actions pour ajouter, vider le panier et quitter.

### TP 1 : Structures de contrôle et boucles
- **[menu_tp1.php](menu_tp1.php)** : Page d'accueil pour naviguer entre les exercices du TP 1.
- **[exercice1.php](exercice1.php)** : Répétition des chiffres en triangle (1, 22, 333...).
- **[exercice2.php](exercice2.php)** : Boucle `while` avec pas de 3 et mise en valeur conditionnelle.
- **[exercice3.php](exercice3.php)** : Table de multiplication complète de 1 à 10 dans un tableau HTML.
- **[exercice4.php](exercice4.php)** : Somme de deux nombres.
- **[exercice5.php](exercice5.php)** : Table de multiplication de 3 au format tableau (3 x n = résultat).
- **[exercice6.php](exercice6.php)** : Test si une personne est majeure ou mineure.
- **[exercice7.php](exercice7.php)** : Menu permettant de choisir un chiffre avec affichage du détail (`switch`).
- **[exercice8.php](exercice8.php)** : Moyenne des nombres de 1 à 10 avec `for` et `while`.
- **[exercice9.php](exercice9.php)** : Nombres pairs de 0 à 100 avec les trois boucles (`for`, `while`, `do...while`).
- **[exercice10.php](exercice10.php)** : Étoiles en escalier avec double boucle.
- **[exercice11.php](exercice11.php)** : Dessin du haut du sapin en cône sur 6 lignes avec double boucle.

## Lancement

Pour tester localement dans votre navigateur :
```bash
php -S localhost:8000
```
Puis ouvrez [http://localhost:8000](http://localhost:8000).
