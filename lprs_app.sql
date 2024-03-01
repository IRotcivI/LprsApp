-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 01 mars 2024 à 09:15
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

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
  `id_bon` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `ref_piece` int(11) NOT NULL,
  `ref_classe` int(11) NOT NULL,
  `ref_profil` int(11) NOT NULL,
  PRIMARY KEY (`id_bon`),
  KEY `fk_pieceBon` (`ref_piece`),
  KEY `fk_classeBon` (`ref_classe`),
  KEY `fk_profilBon` (`ref_profil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `id_classe` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_classe`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id_classe`, `nom`) VALUES
(1, '2nde TRPM'),
(2, '1ère TRPM'),
(3, 'Term TRPM'),
(4, '1 BTS CPRP'),
(5, '2 BTS CPRP'),
(6, 'CQPM'),
(7, 'Fab Spé');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `numCommande` int(11) NOT NULL,
  `dateCommande` date NOT NULL,
  `numDevis` int(11) NOT NULL,
  `ref_client` int(11) NOT NULL,
  `ref_fournisseur` int(11) NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `fk_profilCommande` (`ref_client`),
  KEY `fk_fournisseurCommande` (`ref_fournisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commandematiere`
--

DROP TABLE IF EXISTS `commandematiere`;
CREATE TABLE IF NOT EXISTS `commandematiere` (
  `ref_commande` int(11) NOT NULL,
  `ref_matiere` int(11) NOT NULL,
  KEY `fk_commandeMatiere` (`ref_commande`),
  KEY `fk_matiereCommande` (`ref_matiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telephone` int(11) NOT NULL,
  `fonction` varchar(50) NOT NULL,
  `voie` varchar(50) NOT NULL,
  `rue` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `codePostal` int(11) NOT NULL,
  PRIMARY KEY (`id_fournisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `materiau`
--

DROP TABLE IF EXISTS `materiau`;
CREATE TABLE IF NOT EXISTS `materiau` (
  `id_materiau` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_materiau`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `materiau`
--

INSERT INTO `materiau` (`id_materiau`, `nom`) VALUES
(1, 'aluminium'),
(2, 'bronze'),
(3, 'acier'),
(4, 'pom');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `id_matiere` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `longueur` int(11) NOT NULL,
  `largueur` int(11) NOT NULL,
  `epaisseur` int(11) NOT NULL,
  `hauteur` int(11) NOT NULL,
  `diametre` int(11) NOT NULL,
  `prixUnitaire` int(11) NOT NULL,
  `longueurTotalDispo` int(11) NOT NULL,
  `ref_materiau` int(11) NOT NULL,
  PRIMARY KEY (`id_matiere`),
  KEY `fk_materiauMatiere` (`ref_materiau`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

DROP TABLE IF EXISTS `piece`;
CREATE TABLE IF NOT EXISTS `piece` (
  `id_piece` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_piece`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`id_piece`, `nom`) VALUES
(1, 'commande reculee top block_A'),
(2, 'commande reculee top block_B'),
(3, 'extracteur bouton molete'),
(4, 'extracteur support griffe'),
(5, 'extracteur reglage griffe'),
(6, 'go pro corps'),
(7, 'go pro indexeur'),
(8, 'go pro vis de commande'),
(9, 'street carver biellette'),
(10, 'street carver bras'),
(11, 'street carver jante 1'),
(12, 'street carver jante 2'),
(13, 'street carver pivot'),
(14, 'toupie de frappe - bague de serrage'),
(15, 'toupie de frappe -noix'),
(16, 'traitement d\'air - embase'),
(17, 'trot skate - bloc liaison'),
(18, 'trot skate - collier de direction'),
(19, 'trot skate - etriet droit ou gauche'),
(20, 'trot skate - potence'),
(21, 'vanne rapide reservoir - bouchon'),
(22, 'vanne rapide reservoir - guide axe'),
(23, 'vanne rapide reservoir - obturateur'),
(24, 'vanne rapide reservoir - plaque superieur v2');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `id_profil` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `fonctionClasse` varchar(50) NOT NULL,
  `motDePasse` varchar(50) NOT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
  `id_systeme` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_systeme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bondedebit`
--
ALTER TABLE `bondedebit`
  ADD CONSTRAINT `fk_classeBon` FOREIGN KEY (`ref_classe`) REFERENCES `classe` (`id_classe`),
  ADD CONSTRAINT `fk_pieceBon` FOREIGN KEY (`ref_piece`) REFERENCES `piece` (`id_piece`),
  ADD CONSTRAINT `fk_profilBon` FOREIGN KEY (`ref_profil`) REFERENCES `profil` (`id_profil`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_fournisseurCommande` FOREIGN KEY (`ref_fournisseur`) REFERENCES `fournisseur` (`id_fournisseur`),
  ADD CONSTRAINT `fk_profilCommande` FOREIGN KEY (`ref_client`) REFERENCES `profil` (`id_profil`);

--
-- Contraintes pour la table `commandematiere`
--
ALTER TABLE `commandematiere`
  ADD CONSTRAINT `fk_commandeMatiere` FOREIGN KEY (`ref_commande`) REFERENCES `commande` (`id_commande`),
  ADD CONSTRAINT `fk_matiereCommande` FOREIGN KEY (`ref_matiere`) REFERENCES `matiere` (`id_matiere`);

--
-- Contraintes pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `fk_materiauMatiere` FOREIGN KEY (`ref_materiau`) REFERENCES `materiau` (`id_materiau`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
