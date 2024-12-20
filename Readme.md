# Site Web Cuisinier Mondialement Reconnu

## Contexte du Projet
Le projet consiste à développer un site web pour un chef cuisinier mondialement reconnu, offrant une expérience gastronomique unique. Les utilisateurs peuvent découvrir des menus exclusifs, réserver des expériences culinaires à domicile et interagir avec le chef.

## Objectifs du Projet
Le site web permettra à deux types d'utilisateurs d'interagir avec la plateforme :
- **Utilisateurs (Clients)** : Découvrir les menus proposés par le chef, s'inscrire, se connecter, et réserver une expérience culinaire.
- **Chefs (Administrateurs)** : Se connecter et gérer les réservations (accepter, refuser, consulter les statistiques des demandes, et gérer leur profil).

## Fonctionnalités Principales

### 1. **Inscription et Connexion**
- Les utilisateurs et chefs peuvent s’inscrire et se connecter.
- Après une authentification réussie, les utilisateurs seront redirigés vers des pages spécifiques en fonction de leur rôle (utilisateur ou chef).

### 2. **Page Utilisateur (Client)**
- Consultation des menus du chef.
- Réservation d'une expérience culinaire (sélection de la date, heure et nombre de personnes).
- Gestion des réservations : consulter l’historique, modifier ou annuler des réservations.

### 3. **Page Chef (Dashboard)**
- Gestion des réservations : accepter ou refuser les demandes selon la disponibilité.
- Affichage des statistiques détaillées pour le chef :
  - Nombre de demandes en attente.
  - Nombre de demandes approuvées pour la journée.
  - Nombre de demandes approuvées pour le jour suivant.
  - Détails du prochain client et de sa réservation.
  - Nombre de clients inscrits.

### 4. **Design**
- **Responsive Design** : Le site est compatible avec toutes les tailles d’écrans (mobile, tablette, desktop).
- **Esthétique** : Design moderne et élégant, avec des couleurs raffinées représentant le luxe.
- **UX/UI** : Interface intuitive et agréable pour une navigation fluide.

## Fonctionnalités JavaScript

### 1. **Validation des Formulaires avec Regex**
- Utilisation des expressions régulières pour valider les entrées des utilisateurs dans les formulaires (email, téléphone, mot de passe, etc.).

### 2. **Formulaires Dynamiques d’Ajout de Menus**
- Permettre aux chefs d'ajouter dynamiquement plusieurs plats dans un menu.
- Les champs de saisie des plats peuvent être ajoutés ou supprimés dynamiquement, sans recharger la page.

### 3. **Modals Dynamiques**
- Utilisation de modals pour afficher des informations sans recharger la page (détails de la réservation, confirmation d’action, message d'erreur).

### 4. **SweetAlerts**
- Intégration de SweetAlert pour des alertes visuelles élégantes pour des actions importantes (confirmation d'une réservation, annulation de réservation).

## Sécurité des Données

### 1. **Hashage des Mots de Passe**
- Utilisation de techniques sécurisées pour le hashage des mots de passe.

### 2. **Protection contre les Failles XSS (Cross-Site Scripting)**
- Nettoyage et échappement des entrées utilisateurs pour éviter les attaques XSS (HTMLPurifier, validation côté serveur).

### 3. **Prévention des Injections SQL**
- Utilisation de requêtes préparées pour interagir avec la base de données et prévenir les attaques SQL.


