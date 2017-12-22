-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 22 Mars 2014 à 08:43
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `pixel`
--
CREATE DATABASE IF NOT EXISTS `pixel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pixel`;

-- --------------------------------------------------------

--
-- Structure de la table `action_tache`
--

CREATE TABLE IF NOT EXISTS `action_tache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_creation` varchar(30) NOT NULL,
  `heure` varchar(30) NOT NULL,
  `tache` varchar(30) NOT NULL,
  `descriptif` text NOT NULL,
  `temps_passe` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(30) NOT NULL,
  `heure` varchar(30) NOT NULL,
  `dossier` int(30) NOT NULL,
  `tache` varchar(30) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `adresse` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `id_responsable`, `adresse`) VALUES
(1, 'saleh', 1, '20 rue ibn thabet');

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE IF NOT EXISTS `competences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `id_domaine` int(11) NOT NULL,
  `competences` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `conges`
--

CREATE TABLE IF NOT EXISTS `conges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date_deb` varchar(30) NOT NULL,
  `date_fin` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `contrats`
--

CREATE TABLE IF NOT EXISTS `contrats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client` int(11) NOT NULL,
  `date_deb` varchar(30) NOT NULL,
  `date_fin` varchar(30) NOT NULL,
  `type_contrat` enum('creation','credit heure','forfait') NOT NULL,
  `nb_heure_achete` int(11) NOT NULL,
  `nb_heure_consommee` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `contrats`
--

INSERT INTO `contrats` (`id`, `client`, `date_deb`, `date_fin`, `type_contrat`, `nb_heure_achete`, `nb_heure_consommee`) VALUES
(1, 1, '2013-04-02', '201404-01', 'creation', 100, 40);

-- --------------------------------------------------------

--
-- Structure de la table `domaines`
--

CREATE TABLE IF NOT EXISTS `domaines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `dossier`
--

CREATE TABLE IF NOT EXISTS `dossier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  `contrat` varchar(100) NOT NULL,
  `client` int(11) NOT NULL,
  `responsable_client` int(11) NOT NULL,
  `responsable_dossier` int(11) NOT NULL,
  `temps_estime` varchar(30) NOT NULL,
  `date_creation` varchar(30) NOT NULL,
  `date_prise_charge` varchar(30) NOT NULL,
  `date_debut_prod_plan` varchar(30) NOT NULL,
  `date_fin_prod_plan` varchar(30) NOT NULL,
  `date_debut_prod_reelle` varchar(30) NOT NULL,
  `date_fin_prod_reelle` varchar(30) NOT NULL,
  `temps_passe` varchar(30) NOT NULL,
  `etat_dossier` enum('Propose','Valide','prsie_en_charge','production','termine','valide') NOT NULL,
  `descriptif` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ponderation`
--

CREATE TABLE IF NOT EXISTS `ponderation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `id_projet` int(11) NOT NULL,
  `ponderation` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `site_web`
--

CREATE TABLE IF NOT EXISTS `site_web` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `gestion_domaine` varchar(100) NOT NULL,
  `echeance_domaine` varchar(100) NOT NULL,
  `type serveur` varchar(100) NOT NULL,
  `code_ftp` varchar(100) NOT NULL,
  `date_creation` varchar(30) NOT NULL,
  `prestation_liee` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

CREATE TABLE IF NOT EXISTS `taches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` int(100) NOT NULL,
  `dossier` int(11) NOT NULL,
  `temps_estime` int(11) NOT NULL,
  `chef_projet_affect` int(11) NOT NULL,
  `developpeur_affect` int(11) NOT NULL,
  `date_creation` varchar(30) NOT NULL,
  `date_deb` varchar(30) NOT NULL,
  `date_fin` varchar(30) NOT NULL,
  `descriptif` text NOT NULL,
  `etat_tache` int(11) NOT NULL,
  `temps_passe` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fonction` varchar(50) NOT NULL,
  `niveau_user` enum('Responsable client','Responsable dossier','Chef de projet','Developpeur','Infographiste') NOT NULL,
  `date_entree` date NOT NULL,
  `compte_actif` enum('oui','non') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `password`, `fonction`, `niveau_user`, `date_entree`, `compte_actif`) VALUES
(1, 'ben saleh', 'saleh', 'saleh@gmail.com', '123', 'developpeur', 'Responsable client', '2011-09-07', 'oui'),
(2, 'ben saleh', 'saleh', 'aze@yahoo.fr', '123aze', 'developpeur', 'Responsable client', '2011-09-07', 'non'),
(3, 'ben saleh', 'saleh', 'saleh@gmail.com', '123456', 'developpeur', 'Responsable client', '2011-09-07', 'oui'),
(4, 'ben saleh', 'saleh', 'saleh@gmail.com', '!1987aze#', 'developpeur', 'Responsable client', '2011-09-07', 'non'),
(5, 'ben saleh', 'saleh', 'saleh@gmail.com', '!1987aze#', 'developpeur', 'Responsable client', '2011-09-07', 'non'),
(6, 'ben saleh', 'saleh', 'saleh@gmail.com', '!1987aze#', 'developpeur', 'Responsable client', '2011-09-07', 'non');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
