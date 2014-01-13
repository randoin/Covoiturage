-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 13 Janvier 2014 à 14:23
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
-- Structure de la table `COVOITURAGE`
--

CREATE TABLE IF NOT EXISTS `COVOITURAGE` (
  `NUMEROCOVOIT` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `MONTANT` int(100) NOT NULL,
  `PLAQUEIMMATRICULATION` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `IDENTIFIANTLIEU` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `IDENTIFIANTLIEU_ARRIVEE` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `PLACESDISPO` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DATEDEPART` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`NUMEROCOVOIT`),
  KEY `I_FK_COVOITURAGE_VEHICULE` (`PLAQUEIMMATRICULATION`),
  KEY `I_FK_COVOITURAGE_LIEU` (`IDENTIFIANTLIEU`),
  KEY `I_FK_COVOITURAGE_LIEU1` (`IDENTIFIANTLIEU_ARRIVEE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `COVOITURAGE`
--


-- --------------------------------------------------------

--
-- Structure de la table `ETREPASSAGER`
--

CREATE TABLE IF NOT EXISTS `ETREPASSAGER` (
  `NUMEROCOVOIT` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `MATRICULE` char(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`NUMEROCOVOIT`,`MATRICULE`),
  KEY `I_FK_ETREPASSAGER_COVOITURAGE` (`NUMEROCOVOIT`),
  KEY `I_FK_ETREPASSAGER_UTILISATEUR` (`MATRICULE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `ETREPASSAGER`
--


-- --------------------------------------------------------

--
-- Structure de la table `LIEU`
--

CREATE TABLE IF NOT EXISTS `LIEU` (
  `IDENTIFIANTLIEU` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `NOMVILLE` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`IDENTIFIANTLIEU`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `LIEU`
--


-- --------------------------------------------------------

--
-- Structure de la table `PASSERPAR`
--

CREATE TABLE IF NOT EXISTS `PASSERPAR` (
  `NUMEROCOVOIT` int(100) NOT NULL,
  `IDENTIFIANTLIEU` char(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`NUMEROCOVOIT`,`IDENTIFIANTLIEU`),
  KEY `I_FK_PASSERPAR_COVOITURAGE` (`NUMEROCOVOIT`),
  KEY `I_FK_PASSERPAR_LIEU` (`IDENTIFIANTLIEU`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `PASSERPAR`
--


-- --------------------------------------------------------

--
-- Structure de la table `UTILISATEUR`
--

CREATE TABLE IF NOT EXISTS `UTILISATEUR` (
  `MATRICULE` int(100) NOT NULL,
  `NOM` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PRENOM` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LOGIN` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MOTDEPASSE` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ADRESSEMAIL` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NUMEROTEL` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MATRICULE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `UTILISATEUR`
--

INSERT INTO `UTILISATEUR` (`MATRICULE`, `NOM`, `PRENOM`, `LOGIN`, `MOTDEPASSE`, `ADRESSEMAIL`, `NUMEROTEL`) VALUES
(0, 'lucas', 'boutrot', 'thornydre', 'john', 'thornydre@gmail.com', '0625478935');

-- --------------------------------------------------------

--
-- Structure de la table `VEHICULE`
--

CREATE TABLE IF NOT EXISTS `VEHICULE` (
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
-- Contenu de la table `VEHICULE`
--

