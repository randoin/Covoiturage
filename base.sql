-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 13 Janvier 2014 à 15:31
-- Version du serveur: 5.1.63
-- Version de PHP: 5.3.3-7+squeeze15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projet_agileb`
--
CREATE DATABASE `projet_agileb` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `projet_agileb`;

-- --------------------------------------------------------

--
-- Structure de la table `covoiturage`
--

CREATE TABLE IF NOT EXISTS `covoiturage` (
  `NUMEROCOVOIT` int(100) NOT NULL,
  `MONTANT` int(100) NOT NULL,
  `PLAQUEIMMATRICULATION` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `IDENTIFIANTLIEU` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `IDENTIFIANTLIEU_ARRIVEE` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `PLACESDISPO` int(100) DEFAULT NULL,
  `DATEDEPART` date DEFAULT NULL,
  PRIMARY KEY (`NUMEROCOVOIT`),
  KEY `I_FK_COVOITURAGE_VEHICULE` (`PLAQUEIMMATRICULATION`),
  KEY `I_FK_COVOITURAGE_LIEU` (`IDENTIFIANTLIEU`),
  KEY `I_FK_COVOITURAGE_LIEU1` (`IDENTIFIANTLIEU_ARRIVEE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `covoiturage`
--


-- --------------------------------------------------------

--
-- Structure de la table `demandercovoiturage`
--

CREATE TABLE IF NOT EXISTS `demandercovoiturage` (
  `NUMEROCOVOIT` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `MATRICULE` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `VALIDE` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`NUMEROCOVOIT`,`MATRICULE`),
  KEY `I_FK_ETREPASSAGER_COVOITURAGE` (`NUMEROCOVOIT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `demandercovoiturage`
--


-- --------------------------------------------------------

--
-- Structure de la table `etape`
--

CREATE TABLE IF NOT EXISTS `etape` (
  `NUMEROCOVOIT` int(100) NOT NULL,
  `IDENTIFIANTLIEU` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `NUMEROETAPE` int(100) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`NUMEROCOVOIT`,`IDENTIFIANTLIEU`,`NUMEROETAPE`),
  KEY `I_FK_PASSERPAR_COVOITURAGE` (`NUMEROCOVOIT`),
  KEY `I_FK_PASSERPAR_LIEU` (`IDENTIFIANTLIEU`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contenu de la table `etape`
--


-- --------------------------------------------------------

--
-- Structure de la table `etrepassager`
--

CREATE TABLE IF NOT EXISTS `etrepassager` (
  `NUMEROCOVOIT` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `MATRICULE` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `CODEPASSAGER` char(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`NUMEROCOVOIT`,`MATRICULE`),
  KEY `I_FK_ETREPASSAGER_COVOITURAGE` (`NUMEROCOVOIT`),
  KEY `I_FK_ETREPASSAGER_UTILISATEUR` (`MATRICULE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `etrepassager`
--


-- --------------------------------------------------------

--
-- Structure de la table `generercode`
--

CREATE TABLE IF NOT EXISTS `generercode` (
  `CODEPAIEMENT` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `MATRICULECONDUCTEUR` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `MATRICULEPASSAGER` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `NUMEROCOVOIT` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MATRICULECONDUCTEUR`,`MATRICULEPASSAGER`,`NUMEROCOVOIT`),
  UNIQUE KEY `CODEPAIEMENT` (`CODEPAIEMENT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `generercode`
--


-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

CREATE TABLE IF NOT EXISTS `lieu` (
  `IDENTIFIANTLIEU` int(10) NOT NULL,
  `NOMVILLE` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`IDENTIFIANTLIEU`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `lieu`
--


-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `MATRICULE` int(100) NOT NULL,
  `NOM` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PRENOM` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MOTDEPASSE` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ADRESSEMAIL` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NUMEROTEL` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MATRICULE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`MATRICULE`, `NOM`, `PRENOM`, `MOTDEPASSE`, `ADRESSEMAIL`, `NUMEROTEL`) VALUES
(0, 'lucas', 'boutrot', 'john', 'thornydre@gmail.com', '0625478935');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE IF NOT EXISTS `vehicule` (
  `PLAQUEIMMATRICULATION` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `MATRICULE` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `MODELE` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TYPE` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COULEUR` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NIVEAUCONFORT` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PLAQUEIMMATRICULATION`),
  KEY `I_FK_VEHICULE_UTILISATEUR` (`MATRICULE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `vehicule`
--

