# TP Brute Force - PHP

Ce projet a été réalisé dans le cadre d’un **Travail Pratique encadré** en cours de cybersécurité / développement web.  
L’objectif est de comprendre les principes d’une attaque par **brute force** et d’en démontrer les limites, les risques, et l’importance de la sécurisation des formulaires de connexion.

## 🔍 Objectif

Créer un script en PHP capable de :

- Générer toutes les combinaisons possibles d’un mot de passe
- Commencer à une longueur de 4 caractères et augmenter progressivement
- Utiliser un jeu de caractères spécifique fourni par l’enseignant
- Tester chaque mot de passe en envoyant une requête HTTP POST vers un site de test fourni dans le cadre du TP
- Identifier le mot de passe correct en analysant la réponse du serveur

## 🧠 Contexte pédagogique

⚠️ Ce script **n’est pas destiné à être utilisé dans un contexte réel ou malveillant**.  
Il est uniquement développé dans un but éducatif, sur un site prévu pour cet usage par l’enseignant.  
L’exercice vise à sensibiliser aux problématiques de sécurité web, notamment :

- L'importance de la limitation des tentatives de connexion
- L'intérêt des captchas, des délais, et des verrouillages de compte
- Les bonnes pratiques de gestion de mots de passe côté serveur

## 🛠️ Technologies utilisées

- PHP (sans framework)
- cURL (pour les requêtes HTTP)
- Terminal / CLI

## ⚙️ Lancer le script

1. Copier le fichier `bruteforce.php` dans un dossier local.
2. Modifier l’URL cible (`$url`) et le nom du champ (`$passwordField`) si nécessaire.
3. Lancer le script depuis la ligne de commande :

```bash
php bruteforce.php
