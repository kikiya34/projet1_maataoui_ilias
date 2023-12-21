-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 20 déc. 2023 à 13:38
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `added_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(1, 800.00, 'on_hold', 1, 12345678, 'miami', 'miami', '2023-12-19 11:42:50'),
(2, 3200.00, 'on_hold', 1, 123456, 'tata', 'tata', '2023-12-19 12:13:54'),
(3, 3200.00, 'on_hold', 1, 993618, 'tata', 'tata', '2023-12-19 12:28:44'),
(4, 4800.00, 'on_hold', 1, 993618, 'tata', 'tata', '2023-12-19 12:29:33'),
(5, 4800.00, 'on_hold', 1, 993618, 'tata', 'tata', '2023-12-19 12:36:06'),
(6, 800.00, 'on_hold', 1, 12345678, 'miami', 'miami', '2023-12-19 17:11:17'),
(7, 800.00, 'on_hold', 1, 12345678, 'miami', 'miami', '2023-12-19 17:13:23'),
(8, 800.00, 'on_hold', 1, 12345678, 'miami', 'miami', '2023-12-19 17:15:21'),
(9, 800.00, 'on_hold', 1, 12345678, 'tata', 'miami', '2023-12-19 17:17:21'),
(10, 800.00, 'on_hold', 1, 12345678, 'miami', 'miami', '2023-12-19 17:46:08'),
(11, 800.00, 'on_hold', 1, 12345678, 'miami', 'miami', '2023-12-19 17:47:49'),
(12, 800.00, 'on_hold', 1, 12345678, 'miami', 'miami', '2023-12-19 17:51:39'),
(13, 1600.00, 'on_hold', 1, 12345678, 'miami', 'miami', '2023-12-19 22:10:25'),
(14, 800.00, 'on_hold', 1, 12345678, 'miami', 'miami', '2023-12-19 22:19:24'),
(15, 3200.00, 'on_hold', 1, 993618, 'tata', 'a', '2023-12-19 22:25:32'),
(16, 3200.00, 'on_hold', 1, 12345678, 'miami', 'a', '2023-12-20 13:37:52');

-- --------------------------------------------------------

--
-- Structure de la table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(1, 3, '27', 'Pack', './assets/imgs/shopImgs/pack.jpg', 800.00, 4, 1, '2023-12-19 12:28:44'),
(2, 4, '27', 'Pack', './assets/imgs/shopImgs/pack.jpg', 800.00, 4, 1, '2023-12-19 12:29:33'),
(3, 4, '21', 'Brief Case', './assets/imgs/shopImgs/briefcase.jpg', 800.00, 1, 1, '2023-12-19 12:29:33'),
(4, 4, '22', 'Bucket', './assets/imgs/shopImgs/bucket.jpg', 800.00, 1, 1, '2023-12-19 12:29:33'),
(5, 5, '27', 'Pack', './assets/imgs/shopImgs/pack.jpg', 800.00, 4, 1, '2023-12-19 12:36:06'),
(6, 5, '21', 'Brief Case', './assets/imgs/shopImgs/briefcase.jpg', 800.00, 1, 1, '2023-12-19 12:36:06'),
(7, 5, '22', 'Bucket', './assets/imgs/shopImgs/bucket.jpg', 800.00, 1, 1, '2023-12-19 12:36:06'),
(8, 6, '24', 'Duffel', './assets/imgs/shopImgs/duffel.jpg', 800.00, 1, 1, '2023-12-19 17:11:17'),
(9, 7, '24', 'Duffel', './assets/imgs/shopImgs/duffel.jpg', 800.00, 1, 1, '2023-12-19 17:13:23'),
(10, 8, '24', 'Duffel', './assets/imgs/shopImgs/duffel.jpg', 800.00, 1, 1, '2023-12-19 17:15:21'),
(11, 9, '24', 'Duffel', './assets/imgs/shopImgs/duffel.jpg', 800.00, 1, 1, '2023-12-19 17:17:21'),
(12, 10, '19', 'Bag', './assets/imgs/shopImgs/bag.jpg', 800.00, 1, 1, '2023-12-19 17:46:08'),
(13, 11, '19', 'Bag', './assets/imgs/shopImgs/bag.jpg', 800.00, 1, 1, '2023-12-19 17:47:49'),
(14, 12, '19', 'Bag', './assets/imgs/shopImgs/bag.jpg', 800.00, 1, 1, '2023-12-19 17:51:39'),
(15, 13, '19', 'Bag', './assets/imgs/shopImgs/bag.jpg', 800.00, 1, 1, '2023-12-19 22:10:25'),
(16, 13, '20', 'Box', './assets/imgs/shopImgs/box.jpg', 800.00, 1, 1, '2023-12-19 22:10:25'),
(17, 14, '20', 'Box', './assets/imgs/shopImgs/box.jpg', 800.00, 1, 1, '2023-12-19 22:19:24'),
(18, 15, '20', 'Box', './assets/imgs/shopImgs/box.jpg', 800.00, 3, 1, '2023-12-19 22:25:32'),
(19, 15, '19', 'Bag', './assets/imgs/shopImgs/bag.jpg', 800.00, 1, 1, '2023-12-19 22:25:32'),
(20, 16, '20', 'Box', './assets/imgs/shopImgs/box.jpg', 800.00, 4, 1, '2023-12-20 13:37:52');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`) VALUES
(19, 'Bag', 'Un sac est un récipient souple conçu pour contenir ou préserver quelque chose. Cependant, de nos jours au XXI? siècle', './assets/imgs/shopImgs/bag.jpg', './assets/imgs/shopImgs/bag.jpg', './assets/imgs/shopImgs/bag.jpg', './assets/imgs/shopImgs/bag.jpg', 800.00),
(20, 'Box', 'Un sac est un récipient souple conçu pour contenir ou préserver quelque chose. Cependant, de nos jours au XXI? siècle', './assets/imgs/shopImgs/box.jpg', './assets/imgs/shopImgs/box.jpg', './assets/imgs/shopImgs/box.jpg', './assets/imgs/shopImgs/box.jpg', 800.00),
(21, 'Brief Case', 'Un sac est un récipient souple conçu pour contenir ou préserver quelque chose. Cependant, de nos jours au XXI? siècle', './assets/imgs/shopImgs/briefcase.jpg', './assets/imgs/shopImgs/briefcase.jpg', './assets/imgs/shopImgs/briefcase.jpg', './assets/imgs/shopImgs/briefcase.jpg', 800.00),
(22, 'Bucket', 'Un sac est un récipient souple conçu pour contenir ou préserver quelque chose. Cependant, de nos jours au XXI? siècle', './assets/imgs/shopImgs/bucket.jpg', './assets/imgs/shopImgs/bucket.jpg', './assets/imgs/shopImgs/bucket.jpg', './assets/imgs/shopImgs/bucket.jpg', 800.00),
(23, 'Coin Purse', 'Un sac est un récipient souple conçu pour contenir ou préserver quelque chose. Cependant, de nos jours au XXI? siècle', './assets/imgs/shopImgs/coinPurse.jpg', './assets/imgs/shopImgs/coinPurse.jpg', './assets/imgs/shopImgs/coinPurse.jpg', './assets/imgs/shopImgs/coinPurse.jpg', 800.00),
(24, 'Duffel', 'Un sac est un récipient souple conçu pour contenir ou préserver quelque chose. Cependant, de nos jours au XXI? siècle', './assets/imgs/shopImgs/duffel.jpg', './assets/imgs/shopImgs/duffel.jpg', './assets/imgs/shopImgs/duffel.jpg', './assets/imgs/shopImgs/duffel.jpg', 800.00),
(25, 'Frame', 'Un sac est un récipient souple conçu pour contenir ou préserver quelque chose. Cependant, de nos jours au XXI? siècle', './assets/imgs/shopImgs/frame.jpg', './assets/imgs/shopImgs/frame.jpg', './assets/imgs/shopImgs/frame.jpg', './assets/imgs/shopImgs/frame.jpg', 800.00),
(26, 'Speedy', 'Un sac est un récipient souple conçu pour contenir ou préserver quelque chose. Cependant, de nos jours au XXI? siècle', './assets/imgs/shopImgs/speedy.jpg', './assets/imgs/shopImgs/speedy.jpg', './assets/imgs/shopImgs/speedy.jpg', './assets/imgs/shopImgs/speedy.jpg', 800.00),
(27, 'Pack', 'Un sac est un récipient souple conçu pour contenir ou préserver quelque chose. Cependant, de nos jours au XXI? siècle', './assets/imgs/shopImgs/pack.jpg', './assets/imgs/shopImgs/pack.jpg', './assets/imgs/shopImgs/pack.jpg', './assets/imgs/shopImgs/pack.jpg', 800.00);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'jhon', 'info@email.com', '$2y$10$2PBCk0cyA/anhj8zgLgTweoKO9a1m3bkam0RHQr4WE57Yagrb7G/u');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Index pour la table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
