# Directives du Projet & Workflow Automatique

## Déploiement automatique sur GitHub en fin de tâche
Dès que les exercices, fonctionnalités ou tâches demandées sur un dossier/projet sont terminés :
1. **Initialiser Git** : Si le dossier ne contient pas de `.git`, lancer `git init` sur la branche `main`.
2. **Commit complet** :
   - Ajouter un fichier `README.md` récapitulatif clair et propre.
   - Indexer l'ensemble des fichiers pertinents (`git add .`).
   - Effectuer un commit descriptif : `git commit -m "feat: initial commit for <NomDuDossier>"`.
3. **Création & Push GitHub** :
   - Créer automatiquement le repository distant avec le nom du dossier courant sur le compte GitHub `topmouhamed777-commits` :
     ```powershell
     gh repo create <NomDuDossier> --public --source=. --remote=origin --push
     ```
   - Si `gh` n'est pas encore disponible, configurer le remote `origin` vers `https://github.com/topmouhamed777-commits/<NomDuDossier>.git` et inviter à pousser ou exécuter le push.
4. **Restitution** : Fournir à l'utilisateur le lien direct vers le nouveau repository GitHub.
