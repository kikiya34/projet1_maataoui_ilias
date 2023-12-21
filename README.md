# projet1_maataoui_ilias

# run:  php -S localhost:8000

###### Documentation du projet #################################################


-------------------------------------------------------------------------------------------


# Dossier Assets
Ce dossier contient toutes les ressources statiques utilisées dans l'application web, telles que les styles CSS et les images.
## Structure du Dossier
### CSS (/assets/css)
- **style.css** : Le fichier principal de style CSS. Contient des règles personnalisées pour l'apparence du site.
### Images (/assets/imgs)
- **Logo et Icônes** : Images telles que le logo du site et d'autres icônes utilisées dans la navigation.
- **Produits** : Images des produits pour la boutique en ligne.
- **Bannières et Publicités** : Images pour les promotions ou les publicités sur le site.
- **Autres Images** : Images diverses utilisées dans le site (par exemple, pour les sections "À propos" ou "Histoire").

--------------------------------------------------------------------------------------

# Connexion à la Base de Données
La connexion à la base de données est un élément essentiel de notre application web. Elle permet à l'application d'interagir avec la base de données MySQL pour les opérations de lecture, écriture, mise à jour et suppression de données.
## Fichier de Connexion
- **Nom du fichier** : `connection.php`
- **Emplacement** : Ce fichier se trouve généralement dans le dossier racine ou dans un sous-dossier pour les scripts PHP.
## Fonctionnalités du Fichier `connection.php`
- **Établissement de la Connexion** : Le fichier utilise `mysqli_connect` pour créer une connexion avec la base de données MySQL.
- **Paramètres de Connexion** : Les détails de connexion, tels que le nom d'hôte, le nom d'utilisateur, le mot de passe et le nom de la base de données, sont définis dans ce fichier.
- **Gestion des Erreurs** : En cas d'échec de connexion, le fichier affiche un message d'erreur.
------------------------------------------------------------------------------

 # Récupération des Produits pour la Boutique (`get_shop_products.php` )
Le script `get_shop_products.php` est utilisé pour récupérer les informations des produits de la base de données. Il est essentiel pour afficher les produits disponibles sur la page de la boutique.
## Fonctionnalités
- **Requête de Sélection** : Le script effectue une requête `SELECT` pour récupérer toutes les données de la table `products`.
- **Préparation de la Requête** : Utilisation de `prepare` pour une exécution de requête sécurisée.
- **Exécution et Récupération** : Le script exécute la requête et récupère les résultats.
## Structure et Fonctionnement
- **Inclusion de la Connexion à la Base de Données** : Le script commence par inclure `connection.php` pour établir la connexion avec la base de données.
- **Préparation de la Requête SQL** : La requête SQL est préparée en utilisant la méthode `prepare` de l'objet `$conn`.
- **Exécution de la Requête** : La requête est exécutée par la méthode `execute`.
- **Récupération des Résultats** : Les résultats sont récupérés et stockés dans la variable `$shop_products`.
## Utilisation
Ce script est utilisé pour alimenter les pages affichant les produits de la boutique. Il doit être inclus dans les pages PHP qui nécessitent l'affichage des produits.
## Sécurité
- **Préparation des Requêtes** : L'utilisation de requêtes préparées contribue à la prévention des injections SQL.

-------------------------------------------------------------------------------------------

# Insertion de Produits dans la Base de Données
Le script `insert_products.php` est conçu pour peupler la base de données avec un ensemble initial de produits.
## Fonctionnement
- **Inclusion de la Connexion à la Base de Données** : Le script commence par inclure le fichier `connection.php`.
- **Définition des Produits** : Un tableau `$products` contient les informations de chaque produit à insérer.
- **Insertion des Produits** : Chaque produit du tableau est inséré dans la base de données en utilisant une requête `INSERT`.
## Structure et Contenu des Produits
Chaque produit dans le tableau `$products` est un tableau associatif avec des clés pour le nom, la description, les images et le prix.
## Sécurité
- **Échappement des Caractères Spéciaux** : Utilisation de `mysqli_real_escape_string` pour sécuriser les valeurs avant l'insertion.
## Utilisation
Ce script est exécuté une seule fois pour initialiser la base de données avec les produits. Il doit être exécuté dans un environnement sécurisé.
## Notes Complémentaires
- **Vérification** : Assurez-vous que la table `products` existe dans votre base de données avant d'exécuter ce script.
- **Fermeture de la Connexion** : Le script termine en fermant la connexion à la base de données.

-------------------------------------------------------------------------------------------

# Gestion des Commandes - `place_order.php`

Ce script est responsable de la gestion des commandes passées sur le site web. Il traite les informations de commande soumises et les enregistre dans la base de données.

## Fonctionnalités

- **Initialisation de la Session** : Le script démarre ou reprend une session pour accéder aux données stockées en session.
- **Traitement du Formulaire de Commande** : À la soumission du formulaire, le script collecte les données fournies par l'utilisateur et les informations du panier stockées en session.
- **Insertion de la Commande** : Les détails de la commande sont insérés dans la table `orders` de la base de données.
- **Insertion des Articles de la Commande** : Chaque produit dans le panier est inséré comme un article distinct dans la table `order_items`.
- **Redirection** : Après le traitement de la commande, l'utilisateur est redirigé vers une page de paiement avec un message de confirmation.

## Structure du Script

1. **Inclusion de la Connexion à la Base de Données** : Utilise `include('connection.php')` pour établir une connexion à la base de données.
2. **Vérification du Formulaire Soumis** : Contrôle si le formulaire de commande a été soumis via `isset($_POST['place_order'])`.
3. **Collecte des Informations** : Récupère les informations de l'utilisateur et du panier.
4. **Préparation des Requêtes SQL** : Utilise des requêtes préparées pour insérer des données dans les tables `orders` et `order_items`.
5. **Exécution des Requêtes et Gestion des Erreurs** : Exécute les requêtes et gère les potentielles erreurs.

## Sécurité et Bonnes Pratiques

- **Requêtes Préparées** : Le script utilise des requêtes préparées pour prévenir les injections SQL.
- **Gestion des Sessions** : Assure une gestion sécurisée des sessions pour stocker et récupérer les données du panier.

## Utilisation

Ce script est appelé lorsqu'un utilisateur soumet un formulaire de commande. Il nécessite que les informations du panier soient stockées dans `$_SESSION['cart']` et que les données du formulaire de commande soient transmises via `$_POST`.

## Notes Complémentaires

- **Configuration de la Base de Données** : Assurez-vous que les tables `orders` et `order_items` sont correctement configurées dans votre base de données.
- **Gestion des Redirections** : Modifiez le chemin de redirection en fonction de la structure de votre application.

------------------------------------------------------------------------------------------#

# Page du Compte Utilisateur (`account.php`)

La page de compte permet aux utilisateurs de visualiser et de gérer les informations de leur compte.

## Fonctionnalités

- **Authentification** : La page vérifie si l'utilisateur est connecté avant d'afficher les informations. Sinon, il est redirigé vers la page de connexion.
- **Affichage des Informations** : Affiche le nom et l'email de l'utilisateur récupérés de la session.
- **Gestion de la Déconnexion** : Permet à l'utilisateur de se déconnecter de son compte.
- **Changement de Mot de Passe** : Permet à l'utilisateur de changer son mot de passe.

## Traitement du Changement de Mot de Passe

- **Validation des Formulaires** : Vérifie si les mots de passe saisis correspondent.
- **Mise à Jour de la Base de Données** : Si les mots de passe sont valides, le nouveau mot de passe est haché et mis à jour dans la base de données.

## Sécurité

- **Session Vérifiée** : La page vérifie l'état de la session pour s'assurer que l'utilisateur est bien connecté.
- **Hachage des Mots de Passe** : Utilise `password_hash()` pour sécuriser les mots de passe dans la base de données.

## Structure HTML

- **Navbar** : Une barre de navigation pour une navigation facile dans le site.
- **Informations de Compte** : Section affichant les détails du compte de l'utilisateur.
- **Formulaire de Changement de Mot de Passe** : Un formulaire permettant à l'utilisateur de changer son mot de passe.
- **Pied de Page** : Un pied de page contenant des informations supplémentaires et des liens.

## Utilisation

Accédez à cette page en naviguant vers `account.php` depuis le site web. L'utilisateur doit être connecté pour accéder à cette page.

-------------------------------------------------------------------------------------------

# Gestion du Panier d'Achat (`cart.php`)

Ce script PHP gère le panier d'achat sur un site de commerce électronique.

## Fonctionnalités

- **Ajout de Produits** : Permet aux utilisateurs d'ajouter des produits au panier.
- **Suppression de Produits** : Offre la possibilité de supprimer des produits du panier.
- **Modification des Quantités** : Les utilisateurs peuvent modifier la quantité de chaque produit dans le panier.
- **Calcul du Total** : Calcule le total du panier après chaque modification.
- **Vidage du Panier** : Permet aux utilisateurs de vider entièrement le panier.

## Structure du Script

- Le script commence par démarrer une session pour accéder aux données de session.
- Il traite les demandes d'ajout, de suppression et de modification des produits dans le panier.
- Il utilise des fonctions pour calculer le total du panier et pour réinitialiser le panier.

## Utilisation

- Ce script est intégré dans les pages où le panier d'achat est géré, comme les pages de produits et la page du panier.
- Il réagit aux actions de l'utilisateur, comme l'ajout ou la suppression de produits, et met à jour la session du panier en cons

-------------------------------------------------------------------------------------------

# Page de Paiement - `checkout.php`

Cette page est destinée à traiter le processus de paiement et de finalisation des commandes sur le site web.

## Fonctionnalités

- **Vérification du Panier** : Le script vérifie si le panier contient des produits avant de permettre l'accès à la page de paiement.
- **Formulaire de Paiement** : Un formulaire HTML est présenté pour recueillir les informations de paiement et de livraison de l'utilisateur.

## Structure du Script

- Le script commence par démarrer une session pour accéder aux informations stockées dans la session.
- Il vérifie si le panier (`$_SESSION['cart']`) n'est pas vide et si le formulaire de paiement a été soumis.
- En cas de panier vide ou de non-soumission du formulaire, l'utilisateur est redirigé vers la page d'accueil.

## Utilisation

- Ce script est utilisé sur la page de paiement où les utilisateurs finalisent leurs achats.
- Il nécessite que le panier d'achat ne soit pas vide et que l'utilisateur ait soumis le formulaire de paiement.

## Structure HTML

- **Navbar** : Une barre de navigation pour une navigation facile sur le site.
- **Formulaire de Paiement** : Un formulaire pour entrer les informations nécessaires à la finalisation de la commande.
- **Pied de Page** : Informations supplémentaires et liens utiles.

## Sécurité

- **Redirection** : Les utilisateurs sont redirigés si le panier est vide ou si le formulaire n'est pas correctement soumis, assurant ainsi que seules les commandes valides sont traitées.

-------------------------------------------------------------------------------------------

# Page de Contact (`contact.php`)

Cette page fournit des informations de contact pour l'entreprise et des liens vers les réseaux sociaux.

## Structure de la Page

### En-tête HTML (Head)
- **Métadonnées** : Inclut la définition du charset (`UTF-8`) et le viewport pour la réactivité mobile.
- **Titre de la Page** : Le titre de la page est défini à "Home".
- **Liens CSS** : Intègre Bootstrap pour le style responsive et Font Awesome pour les icônes.

### Corps de la Page (Body)
- **Barre de Navigation (Navbar)**
  - Une barre de navigation fixe en haut qui utilise Bootstrap pour la réactivité.
  - Contient des liens vers d'autres pages du site (`index.php`, `shop.php`, `contact.php`, etc.).
  - Inclut des icônes pour le panier d'achat et le compte utilisateur.

- **Section Contact**
  - Zone de texte centralisée affichant les informations de contact (numéro de téléphone, adresse email).
  - Liens vers les réseaux sociaux (Pinterest, TikTok, Facebook, Instagram, YouTube) permettant aux utilisateurs de suivre l'entreprise sur ces plateformes.

- **Pied de Page (Footer)**
  - Divisé en sections fournissant des liens utiles et des informations supplémentaires comme la politique de livraison, la procédure de retour, etc.
  - Invite à s'abonner pour recevoir des mises à jour sur les produits et les newsletters.

### Scripts JavaScript
- Inclut les scripts nécessaires pour Bootstrap, permettant des fonctionnalités interactives et responsive.

## Utilisation
Cette page est destinée à fournir aux visiteurs des informations clés pour contacter l'entreprise et pour encourager l'engagement sur les réseaux sociaux.

----------------------------------------------------------------------------------------

# index.php
# Description
 Le fichier index.php est la page d'accueil de notre site web de commerce en ligne, nommé "Roots". Cette page est conçue pour présenter les produits, promouvoir les nouvelles arrivées, et fournir des liens vers d'autres sections importantes du site telles que le magasin, le contact, et les informations sur le produit.
# Structure du Fichier
- En-tête HTML : Déclaration du type de document (DOCTYPE html) et configuration de la langue (lang="en"), avec des métadonnées pour la compatibilité des navigateurs et la réactivité du site.
 -Liens Bootstrap et FontAwesome : Intégration de Bootstrap pour le CSS et FontAwesome pour les icônes.
 -Lien vers le CSS personnalisé : Lien vers style.css pour les styles personnalisés.
 -Barre de navigation (Navbar) : Une barre de navigation responsive avec des liens vers les différentes pages du site.
 -Section Principale (Home) : Affichage des nouveautés et d'un bouton pour rediriger vers la page du magasin.
 -Section Marque (Brand) : Présentation de la marque et de ses valeurs, avec des images et du texte descriptif.
-Section Nouveautés (New) : Vitrine des nouveaux produits avec des images et des liens    vers la page du magasin.
 -Pied de page (Footer) : Liens utiles, informations de contact, et liens vers les réseaux sociaux.

 ---------------------------------------------------------------------------------------
 
## Page de Connexion PHP/HTML
- Description Générale
La page de connexion permet aux utilisateurs d'accéder à leur compte. Elle implémente une vérification sécurisée des identifiants et redirige les utilisateurs vers leur compte ou affiche des messages d'erreur en cas de problèmes de connexion.

#  Structure de la Page
En-tête HTML (Head)

Inclut les métadonnées, le titre de la page ("Login"), et des liens vers les ressources CSS.
Corps de la Page (Body)

Barre de Navigation (Navbar)
Navigation principale du site avec des liens vers d'autres pages.
Formulaire de Connexion
Un formulaire pour saisir l'email et le mot de passe.
Affichage des messages d'erreur en fonction de l'état de la connexion.
Pied de Page (Footer)
Inclut des informations supplémentaires, des liens utiles et des icônes de réseaux sociaux.
# Fonctionnalités
Authentification des Utilisateurs : Permet aux utilisateurs de se connecter en utilisant leur email et mot de passe.
Redirection Automatique : Redirige automatiquement les utilisateurs déjà connectés vers leur compte.
Sécurité des Données : Utilise des requêtes préparées pour sécuriser l'authentification et prévenir les injections SQL.
Gestion des Erreurs : Affiche des messages d'erreur appropriés en cas de problème de connexion.
# Logique de Connexion PHP
Le script initie une session et inclut la connexion à la base de données.
Il vérifie si l'utilisateur est déjà connecté et le redirige le cas échéant.
Le script traite les données du formulaire de connexion, en utilisant des requêtes préparées pour éviter les injections SQL.
Il vérifie les informations d'identification et crée des variables de session pour les utilisateurs authentifiés.
# Sécurité et Bonnes Pratiques
Utilisation de Requêtes Préparées : Prévient les injections SQL.
Gestion de Session Sécurisée : Crée une session sécurisée pour maintenir l'état de connexion.
Validation des Données : Vérifie les informations de connexion côté serveur pour une sécurité accrue.
# Utilisation
Les utilisateurs se rendent sur cette page pour se connecter.
En cas de succès, ils sont redirigés vers leur compte.
En cas d'échec, un message d'erreur est affiché.

------------------------------------------------------------------------------

# Page de Paiement (`payment.php`)
Cette documentation fournit un aperçu détaillé de la page de paiement, y compris ses composants principaux et leur fonctionnalité.

1. Démarrage de Session PHP

session_start();

Cette commande initie une session PHP, permettant de conserver les informations utilisateur tout au long de la navigation sur le site.

2. Structure HTML
DOCTYPE: Spécifie le document comme HTML5.
Langue: La langue principale est définie sur l'anglais (lang="en").
3. Section Head
Métadonnées: Définit le jeu de caractères et la configuration de la fenêtre d'affichage.
Titre de la Page: <title>Payment</title>.
Ressources Externes:
Bootstrap pour le CSS et les composants réactifs.
Font Awesome pour les icônes.
Lien vers le CSS personnalisé.
4. Navbar
Utilisation de Bootstrap pour une barre de navigation responsive, avec des liens vers d'autres pages du site et des icônes de fonctionnalités utilisateur.

5. Section de Paiement
Affichage du Statut de Commande et Montant Total: Utilise les données de session PHP et $_GET pour afficher les informations de paiement.
Bouton de Paiement: Permet à l'utilisateur de procéder au paiement.
6. Footer
Liens Utiles: Divers liens vers des informations sur l'entreprise et des politiques.
Abonnement aux Newsletters: Champ pour s'abonner aux mises à jour.
Réseaux Sociaux: Icônes et liens vers les plateformes sociales.
Mentions Légales: Droits d'auteur et informations légales.
7. Intégration JavaScript
Scripts Bootstrap pour les fonctionnalités front-end interactives.

-------------------------------------------------------------------------------------

# Page d' (`register.php`)
## Fonctionnalités
La page permet aux utilisateurs de s'inscrire en créant un nouveau compte.
Elle vérifie si l'utilisateur est déjà connecté et, dans ce cas, le redirige vers la page de son compte.
La page traite les données du formulaire d'inscription, incluant la validation des entrées et la gestion des erreurs.
## Sécurité
Les données du formulaire sont nettoyées pour éviter les injections SQL.
Les mots de passe sont hachés avant d'être stockés dans la base de données pour une sécurité accrue.
## Gestion des Erreurs
La page gère plusieurs cas d'erreurs, tels que les mots de passe non correspondants, la courte longueur du mot de passe, et l'existence préalable de l'email.
## Redirections
Après une inscription réussie, l'utilisateur est redirigé vers la page de son compte avec un message de succès.
En cas d'échec, l'utilisateur est redirigé vers la page d'inscription avec un message d'erreur approprié.
Intégration Front-end
La page utilise Bootstrap pour un design réactif et attrayant.
Elle intègre un formulaire d'inscription avec validation côté client.
## Footer
Le footer contient des informations utiles et des liens vers les réseaux sociaux.
Cette documentation peut être incluse dans un fichier README pour offrir une vue d'ensemble claire de la page d'inscription et de ses fonctionnalités.

-----------------------------------------------------------------------------------------

# "Shop"
## Fonctionnalités
La page "Shop" permet aux utilisateurs de parcourir et d'acheter des produits.
Les produits sont affichés avec leurs images, noms, prix et un lien pour les acheter.
## Structure
En-tête: Inclut les liens Bootstrap et Font Awesome, ainsi que le CSS personnalisé.
Barre de navigation: Fournit des liens vers d'autres pages du site et des fonctionnalités comme le panier et le compte utilisateur.
Section des produits: Affiche les produits disponibles à l'achat. Chaque produit est présenté avec une image, des étoiles de notation, le nom, le prix et un bouton d'achat.
## Intégration PHP
La page intègre un script PHP pour récupérer les informations des produits depuis la base de données.
## Footer
Contient des liens utiles, des informations sur l'entreprise, une invitation à s'abonner aux newsletters et des liens vers les réseaux sociaux.
## Design
Utilise Bootstrap pour un design réactif adapté aux différents appareils.
Intègre des éléments de style personnalisés pour une apparence unique.

----------------------------------------------------------------------------------------

# Page de Produit Individuel (`single_product.php`)
## Fonctionnalités
Affiche les détails d'un produit spécifique sélectionné par l'utilisateur.
Permet aux utilisateurs d'ajouter le produit à leur panier.
## Structure
En-tête : Inclut les métadonnées nécessaires, les liens vers Bootstrap, Font Awesome et le CSS personnalisé.
Barre de Navigation : Fournit la navigation vers les autres parties du site.
Section du Produit :
Affiche des images et les détails du produit (nom, prix, description).
Contient un formulaire pour ajouter le produit au panier avec la quantité souhaitée.
## Intégration PHP
Récupère les informations du produit de la base de données en utilisant l'ID du produit passé via l'URL.
Gère la redirection si aucun ID de produit n'est fourni.
## Interactivité JavaScript
Permet aux utilisateurs de changer l'image principale du produit en cliquant sur les petites images.
Footer
Contient des informations complémentaires, des liens utiles, et une section d'abonnement aux newsletters.
## Sécurité et Robustesse
La page gère les cas où l'ID du produit n'est pas fourni pour éviter les erreurs.
Utilise des techniques de préparation de requêtes pour se protéger contre les injections SQL.
