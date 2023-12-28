-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 13 déc. 2023 à 14:45
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `p_experts`
--
CREATE DATABASE IF NOT EXISTS `p_experts` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `p_experts`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `nom_art` varchar(255) NOT NULL,
  `prix_art` int(11) NOT NULL,
  `catego` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `name`, `file_url`, `nom_art`, `prix_art`, `catego`) VALUES
(3, '5185VV7AWzL._UX679_.png', 'files/5185VV7AWzL._UX679_.png', 'chemise sur cintre', 1500, 'Adulte'),
(4, '61lMwCLp8ZL._UX569_.png', 'files/61lMwCLp8ZL._UX569_.png', 'chemise sur cintre', 1200, 'Enfant'),
(5, 'chemise-cravate.jpg', 'files/chemise-cravate.jpg', 'chemise pliee', 1300, 'Adulte'),
(6, 'chemise.png', 'files/chemise.png', 'chemise pliee', 800, 'Enfant'),
(8, 'couverture.jpg', 'files/couverture.jpg', 'serviette  ', 1000, 'Adulte'),
(12, 'veste.jpg', 'files/veste.jpg', 'costume 02 pieces ', 4200, 'Adulte'),
(13, 'veste-3piece.jpg', 'files/veste-3piece.jpg', 'costume 03 pieces ', 5500, 'Adulte');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `num_client` int(11) NOT NULL,
  `nom_prenom` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `lu` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`num_client`, `nom_prenom`, `adresse`, `telephone`, `email`, `genre`, `date`, `lu`) VALUES
(7, 'Bouda Frack', 'Tampoui', 64150757, '', 'Homme', '2020-12-12', 0),
(8, 'KABORE Ibrahim ', 'Nagrin', 55667744, 'kabore@gmail.com', 'Homme', '2023-12-01', 0),
(9, 'DAOUDA Ulrich', 'Cissin', 55667799, 'daouda@gmail.com', 'Homme', '2023-12-04', 0);

-- --------------------------------------------------------

--
-- Structure de la table `depot`
--

CREATE TABLE `depot` (
  `order_id` int(11) NOT NULL,
  `num_client` int(10) DEFAULT NULL,
  `item_article` varchar(255) DEFAULT NULL,
  `item_categorie` varchar(255) DEFAULT NULL,
  `item_prix` int(11) DEFAULT NULL,
  `item_quantity` int(10) DEFAULT NULL,
  `lu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `depot`
--

INSERT INTO `depot` (`order_id`, `num_client`, `item_article`, `item_categorie`, `item_prix`, `item_quantity`, `lu`) VALUES
(7, 7, 'Repassage chemise long', 'Adulte', 1500, 4, 0),
(8, 7, 'Lavage veste deux pièces', 'Adulte', 5000, 2, 0),
(9, 8, 'Lavage chemise', 'Adulte', 2000, 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id` int(11) NOT NULL,
  `id_client` int(10) DEFAULT NULL,
  `total_payer` decimal(10,0) DEFAULT NULL,
  `valeur_remise` int(11) DEFAULT NULL,
  `total_remise` double DEFAULT NULL,
  `net_payer` double DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id`, `id_client`, `total_payer`, `valeur_remise`, `total_remise`, `net_payer`, `date`) VALUES
(1, 7, 16000, 30, 4800, 11200, '2023-12-10 15:12:57');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `nom_prenom` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` datetime NOT NULL,
  `lu` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `nom_prenom`, `message`, `date`, `lu`) VALUES
(1, 'Kabore Moise', 'Bonjour habit client 5 tache ', '2023-12-04 12:37:15', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix_prod` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `prix_prod`, `stock`, `date`) VALUES
(2, 'Gelle neud', 500, 40, '2020-09-16');

-- --------------------------------------------------------

--
-- Structure de la table `regle_facture`
--

CREATE TABLE `regle_facture` (
  `id` int(11) NOT NULL,
  `id_facture` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `total_payer` int(11) NOT NULL,
  `total_remise` int(11) NOT NULL,
  `net_payer` double NOT NULL,
  `statut_paie` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom_prenom` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `type_compte` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom_prenom`, `adresse`, `password`, `telephone`, `type_compte`, `date`) VALUES
(2, 'Eloge Zolo', 'Ouaga 2000', 'd033e22ae348aeb5660fc2140aec35850c4da997', 64150757, 'admin', '2020-09-11'),
(4, 'Daouda Ulrich', 'Zone du bois', 'ea96c162baf055276f1cb7335470c1918a16552d', 67456805, 'buandeur', '2020-09-12'),
(5, 'Kabre Nina', 'Goughin', 'b443de4b0ff48581d8743a5f5cad5321e40054c2', 64150757, 'gerant', '2021-05-04');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`num_client`);

--
-- Index pour la table `depot`
--
ALTER TABLE `depot`
  ADD PRIMARY KEY (`order_id`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facture_ibfk_1` (`id_client`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `regle_facture`
--
ALTER TABLE `regle_facture`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `num_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `depot`
--
ALTER TABLE `depot`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `regle_facture`
--
ALTER TABLE `regle_facture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `depot`
--
ALTER TABLE `depot`
  ADD CONSTRAINT `depot_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `client` (`num_client`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`num_client`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
