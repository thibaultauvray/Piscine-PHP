-- phpMyAdmin SQL Dump
-- version 4.3.11.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Dim 12 Avril 2015 à 13:11
-- Version du serveur :  5.5.40
-- Version de PHP :  5.4.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `miniboutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `mdp`) VALUES
(1, 'admin', '4925da7da7a56260baf1c37925a8fa24e46ad8b107dcd21f44e39e4751bae1304fc70de7acb847ffa96126bb372de005f5320f1ede6f9df07c7d53f9c160f022');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(2, 'Fruits'),
(3, 'Légumes'),
(4, 'Épices'),
(5, 'Racines'),
(6, 'Alcool'),
(7, 'Fruits de mer'),
(17, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `categories_products`
--

CREATE TABLE IF NOT EXISTS `categories_products` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_categories` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories_products`
--

INSERT INTO `categories_products` (`id`, `id_produit`, `id_categories`) VALUES
(5, 26, 3),
(6, 27, 3),
(7, 28, 3),
(8, 29, 3),
(9, 30, 3),
(11, 32, 3),
(12, 21, 4),
(14, 23, 5),
(15, 24, 5),
(18, 33, 2),
(19, 33, 3),
(20, 34, 2),
(21, 34, 3),
(22, 35, 2),
(23, 35, 3),
(55, 37, 2),
(56, 37, 4),
(57, 38, 6),
(58, 38, 7);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` varchar(10) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `email`, `nom`, `prenom`, `mdp`, `adresse`, `code_postal`, `ville`, `telephone`) VALUES
(3, 'tauvray@gmail.com', 'dsadsae', 'dsadsae', 'eb2b05d393c087054f27ee9ca57689bdf329c1c4fdab15a618015ddc8b37eab7f335e3c23674adf005545eaddb9f5323b3368b0fa75a52a282594fcfca7540d1', '9 rue des lyon', '45000', 'dewqeqw', '0265874546'),
(4, 'tadasd@hhh.com', 'suis', 'dsadsa', 'b6634076a67061e341eed817e4f68b0c869bb14b0b3a3a00b4840ec6941f9ac06baa99f52276aa58d18ea043b8ebfec6b472077dc9e92a92181082f780d39dee', '9 rue des lyon', '45000', 'dewqeqw', '0265874546'),
(5, 'tamere@gmail.com', 'dsadsa', 'dsadsa', '4925da7da7a56260baf1c37925a8fa24e46ad8b107dcd21f44e39e4751bae1304fc70de7acb847ffa96126bb372de005f5320f1ede6f9df07c7d53f9c160f022', '9 rue des lyon', '45000', 'dewqeqw', '0265874546'),
(6, 'qwerty@qwerty.fr', 'dsadsa', 'dsadsa', '4925da7da7a56260baf1c37925a8fa24e46ad8b107dcd21f44e39e4751bae1304fc70de7acb847ffa96126bb372de005f5320f1ede6f9df07c7d53f9c160f022', '9 rue des lyon', '45000', 'dewqeqw', '0265874546'),
(7, 'asdf@gmail.com', 'asdf', 'asdf', '50a2c4a00a662c1d15a5e9b2a582e453421611b64749d4d51590db6b29e8599f40f38fcc3e3c591c6cdb84f3487cde2a0cd10b7fb0b7d1a7b1f4dc363c7c75ad', '9 rue des lyon', '45000', 'dewqeqw', '0265874546'),
(8, 'pouf@pouf.com', 'pouf', 'pouf', 'b977673353c558e089ef75e700c9eb595d884a16b26d6230f609542cf8c178ce31edc705edcd89958e790b7bdbbdb7066f248345ff7b3efb1427c9852596a654', '9 rue des lyon', '45000', 'dewqeqw', '0265874546'),
(9, 'kilik@gmail.com', 'sadasd', 'dsadas', '91466a01e6060037e5fc4458e357df2213e9cbab8503cb93246b2ded8b31449f96ab2a2df16874bd263a719a15143abc611f16b696f7fcf81c55137d910d9249', '9 rue des lyon', '45000', 'dewqeqw', '0265874546'),
(10, 'sacafoutre@gmail.com', 'foutre', 'sac', '4925da7da7a56260baf1c37925a8fa24e46ad8b107dcd21f44e39e4751bae1304fc70de7acb847ffa96126bb372de005f5320f1ede6f9df07c7d53f9c160f022', '9 rue des lyon', '4', 'dewqeqw', '0265874546');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id`, `id_client`, `prix`) VALUES
(22, 10, 4678);

-- --------------------------------------------------------

--
-- Structure de la table `commande_client`
--

CREATE TABLE IF NOT EXISTS `commande_client` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commande_client`
--

INSERT INTO `commande_client` (`id`, `id_produit`, `id_commande`, `prix`, `quantite`) VALUES
(28, 38, 22, 50, 2),
(29, 24, 22, 4578, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `prix`, `image`, `description`) VALUES
(21, 'Persils', 1, 'img/persil.png', 'lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum '),
(23, 'Carottes', 78, 'img/carotte.jpg', 'lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum '),
(24, 'Oignons', 4578, 'img/oignon.png', 'lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum '),
(26, 'Champignon', 17, 'img/champignon.png', 'lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum '),
(27, 'Choux', 1, 'img/chou.png', 'lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum '),
(28, 'Courgettes', 14, 'img/courgette.png', 'lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum '),
(29, 'Haricots Verts', 10, 'img/haricotsverts.png', 'lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum '),
(30, 'Petits pois', 42, 'img/petitspois.png', 'lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum '),
(32, 'Potirons', 12, 'img/potiron.png', 'lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum lorem lipsum '),
(33, 'Melons', 12, 'img/melon.png', 'Lorem lipsum Lorem lipsum Lorem lipsum Lorem lipsum Lorem lipsum Lorem lipsum Lorem lipsum Lorem lipsum Lorem lipsum '),
(34, 'Pastèques', 1, 'img/pasteque.png', 'Lorem lipsum Lorem lipsum Lorem lipsum Lorem lipsum Lorem lipsum '),
(35, 'Poivrons', 12, 'img/poivron.png', 'Lorem lipsum Lorem lipsum Lorem lipsum Lorem lipsum Lorem lipsum Lorem lipsum '),
(37, 'Ails', 14, 'img/ail.png', ''),
(38, 'Whisky', 50, 'img/3449-1-jb-whisky_1.jpg', ' je suis un lorem lipsum');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories_products`
--
ALTER TABLE `categories_products`
  ADD PRIMARY KEY (`id`), ADD KEY `id_produit` (`id_produit`), ADD KEY `id_categories` (`id_categories`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`), ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `commande_client`
--
ALTER TABLE `commande_client`
  ADD PRIMARY KEY (`id`), ADD KEY `id_produit` (`id_produit`), ADD KEY `id_commande` (`id_commande`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `categories_products`
--
ALTER TABLE `categories_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `commande_client`
--
ALTER TABLE `commande_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `categories_products`
--
ALTER TABLE `categories_products`
ADD CONSTRAINT `fk_product` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `fk_categorie` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
ADD CONSTRAINT `fk-order` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `commande_client`
--
ALTER TABLE `commande_client`
ADD CONSTRAINT `fk_produit` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `fk_commande` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
