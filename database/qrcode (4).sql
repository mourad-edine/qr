-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 12 jan. 2024 à 11:09
-- Version du serveur : 8.0.34
-- Version de PHP : 8.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `qrcode`
--

-- --------------------------------------------------------

--
-- Structure de la table `qrinfo`
--

CREATE TABLE `qrinfo` (
  `id` int NOT NULL,
  `id_utilisateur` int NOT NULL,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `entreprise` varchar(150) DEFAULT NULL,
  `telephone` varchar(150) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `pays` varchar(100) NOT NULL,
  `site` varchar(200) NOT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `password`) VALUES
(1, 'chams', 'pierre', 'francis@gmail.com', '1234'),
(2, 'cdscs', 'csdcsd', 'csdcs', 'csdc'),
(3, 'cic', 'los', 'lo@gmail.com', '1234'),
(4, 'mr', 'mr', 'mr@gmail.com', '1234'),
(5, 'varesh', 'misa', 'mos@gmail.com', '1234'),
(6, 'fMarco', 'polo', 'polo@gmail.com', '1234');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `qrinfo`
--
ALTER TABLE `qrinfo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `qrinfo`
--
ALTER TABLE `qrinfo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `qrinfo`
--
ALTER TABLE `qrinfo`
  ADD CONSTRAINT `qrinfo_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
