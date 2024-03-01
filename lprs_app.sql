-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 01 mars 2024 à 00:22
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lprs_app`
--

-- --------------------------------------------------------

--
-- Structure de la table `bondedebit`
--

DROP TABLE IF EXISTS `bondedebit`;
CREATE TABLE IF NOT EXISTS `bondedebit` (
  `id_bon` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `ref_piece` int NOT NULL,
  `ref_classe` int NOT NULL,
  `ref_profil` int NOT NULL,
  PRIMARY KEY (`id_bon`),
  KEY `fk_pieceBon` (`ref_piece`),
  KEY `fk_classeBon` (`ref_classe`),
  KEY `fk_profilBon` (`ref_profil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `id_classe` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_classe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int NOT NULL AUTO_INCREMENT,
  `numCommande` int NOT NULL,
  `dateCommande` date NOT NULL,
  `numDevis` int NOT NULL,
  `ref_client` int NOT NULL,
  `ref_fournisseur` int NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `fk_profilCommande` (`ref_client`),
  KEY `fk_fournisseurCommande` (`ref_fournisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `commandematiere`
--

DROP TABLE IF EXISTS `commandematiere`;
CREATE TABLE IF NOT EXISTS `commandematiere` (
  `ref_commande` int NOT NULL,
  `ref_matiere` int NOT NULL,
  KEY `fk_commandeMatiere` (`ref_commande`),
  KEY `fk_matiereCommande` (`ref_matiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id_fournisseur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telephone` int NOT NULL,
  `fonction` varchar(50) NOT NULL,
  `voie` varchar(50) NOT NULL,
  `rue` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `codePostal` int NOT NULL,
  PRIMARY KEY (`id_fournisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `materiau`
--

DROP TABLE IF EXISTS `materiau`;
CREATE TABLE IF NOT EXISTS `materiau` (
  `id_materiau` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_materiau`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `id_matiere` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `longueur` int NOT NULL,
  `largueur` int NOT NULL,
  `epaisseur` int NOT NULL,
  `hauteur` int NOT NULL,
  `diametre` int NOT NULL,
  `prixUnitaire` int NOT NULL,
  `longueurTotalDispo` int NOT NULL,
  `ref_materiau` int NOT NULL,
  PRIMARY KEY (`id_matiere`),
  KEY `fk_materiauMatiere` (`ref_materiau`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

DROP TABLE IF EXISTS `piece`;
CREATE TABLE IF NOT EXISTS `piece` (
  `id_piece` int NOT NULL AUTO_INCREMENT,
  `nom` int NOT NULL,
  PRIMARY KEY (`id_piece`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `id_profil` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `fonctionClasse` varchar(50) NOT NULL,
  `motDePasse` varchar(50) NOT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id_profil`, `nom`, `prenom`, `email`, `fonctionClasse`, `motDePasse`) VALUES
(1, 'FAYE', 'Victor', 'f.victor@lprs.fr', 'Eleve', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `systeme`
--

DROP TABLE IF EXISTS `systeme`;
CREATE TABLE IF NOT EXISTS `systeme` (
  `id_systeme` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_systeme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bondedebit`
--
ALTER TABLE `bondedebit`
  ADD CONSTRAINT `fk_classeBon` FOREIGN KEY (`ref_classe`) REFERENCES `classe` (`id_classe`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_pieceBon` FOREIGN KEY (`ref_piece`) REFERENCES `piece` (`id_piece`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_profilBon` FOREIGN KEY (`ref_profil`) REFERENCES `profil` (`id_profil`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_fournisseurCommande` FOREIGN KEY (`ref_fournisseur`) REFERENCES `fournisseur` (`id_fournisseur`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_profilCommande` FOREIGN KEY (`ref_client`) REFERENCES `profil` (`id_profil`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `commandematiere`
--
ALTER TABLE `commandematiere`
  ADD CONSTRAINT `fk_commandeMatiere` FOREIGN KEY (`ref_commande`) REFERENCES `commande` (`id_commande`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_matiereCommande` FOREIGN KEY (`ref_matiere`) REFERENCES `matiere` (`id_matiere`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `fk_materiauMatiere` FOREIGN KEY (`ref_materiau`) REFERENCES `materiau` (`id_materiau`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
