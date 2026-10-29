---
name: github-auto-push
description: >-
  Use this skill automatically whenever work on a user-provided project folder is completed,
  to package, create a new GitHub repository matching the folder name under topmouhamed777-commits,
  and push all files.
---

# GitHub Auto Push Workflow

## Objectif
Automatiser la publication sur GitHub dès qu'un projet ou dossier d'exercices est terminé.

## Procédure

1. **Déterminer le nom du repository :**
   - Utiliser le nom du dossier de travail (ex: `PHP`, `Java-TP2`, etc.).

2. **Vérifier / Initialiser le dépôt local :**
   ```powershell
   git init -b main
   git add .
   git commit -m "feat: initial commit for <NomDossier>"
   ```

3. **Créer le repo et pousser en une commande (avec GitHub CLI) :**
   ```powershell
   gh repo create <NomDossier> --public --source=. --remote=origin --push
   ```

4. **Fallback si gh n'est pas encore disponible :**
   - Configurer le remote vers le compte `topmouhamed777-commits` :
     ```powershell
     git remote add origin https://github.com/topmouhamed777-commits/<NomDossier>.git
     ```
   - Pousser sur `main` dès que le repository distant est accessible :
     ```powershell
     git push -u origin main
     ```
