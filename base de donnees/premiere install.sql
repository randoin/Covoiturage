create table covoiturage (
  `NUMEROCOVOIT` int(100) NOT NULL,
  `CONDUCTEUR` INT( 5 ) NOT NULL,
  `MONTANT` int(100) NOT NULL,
  `PLAQUEIMMATRICULATION` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `IDENTIFIANTLIEU` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `IDENTIFIANTLIEU_ARRIVEE` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `PLACESDISPO` int(100) DEFAULT NULL,
  `DATEDEPART` date DEFAULT NULL,
  `HEUREDEPART` VARCHAR( 20 ) NOT NULL,
  PRIMARY KEY (`NUMEROCOVOIT`),
  KEY `I_FK_COVOITURAGE_VEHICULE` (`PLAQUEIMMATRICULATION`),
  KEY `I_FK_COVOITURAGE_LIEU` (`IDENTIFIANTLIEU`),
  KEY `I_FK_COVOITURAGE_LIEU1` (`IDENTIFIANTLIEU_ARRIVEE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `cherchercovoit` (
  `NUMERODEMANDE` int(5) PRIMARY KEY,
  `MATRICULE` int(5) NOT NULL,
  `IDENTIFIANTLIEU` int(5) NOT NULL,
  `IDENTIFIANTLIEU_ARRIVEE` int(5) NOT NULL,
  `DATEDEPART` date NOT NULL,
  PRIMARY KEY (`NUMERODEMANDE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `demandercovoiturage` (
  `NUMEROCOVOIT` INT( 5 ) COLLATE utf8_unicode_ci NOT NULL,
  `MATRICULE` INT( 5 ) COLLATE utf8_unicode_ci NOT NULL,
  `VALIDE` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`NUMEROCOVOIT`,`MATRICULE`),
  KEY `I_FK_ETREPASSAGER_COVOITURAGE` (`NUMEROCOVOIT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `etape` (
  `NUMEROCOVOIT` int(100) NOT NULL,
  `IDENTIFIANTLIEU` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `NUMEROETAPE` int(100) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`NUMEROCOVOIT`,`IDENTIFIANTLIEU`,`NUMEROETAPE`),
  KEY `I_FK_PASSERPAR_COVOITURAGE` (`NUMEROCOVOIT`),
  KEY `I_FK_PASSERPAR_LIEU` (`IDENTIFIANTLIEU`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE `etrepassager` (
  `NUMEROCOVOIT` INT( 5 ) COLLATE utf8_unicode_ci NOT NULL,
  `MATRICULE` INT( 5 ) COLLATE utf8_unicode_ci NOT NULL,
  `CODEPASSAGER` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `VALIDE` BOOLEAN NOT NULL DEFAULT FALSE,
  PRIMARY KEY (`NUMEROCOVOIT`,`MATRICULE`),
  KEY `I_FK_ETREPASSAGER_COVOITURAGE` (`NUMEROCOVOIT`),
  KEY `I_FK_ETREPASSAGER_UTILISATEUR` (`MATRICULE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `lieu` (
  `IDENTIFIANTLIEU` int(10) NOT NULL,
  `NOMVILLE` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`IDENTIFIANTLIEU`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `utilisateur` (
  `MATRICULE` int(100) NOT NULL,
  `NOM` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PRENOM` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MOTDEPASSE` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ADRESSEMAIL` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NUMEROTEL` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MATRICULE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `vehicule` (
  `PLAQUEIMMATRICULATION` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `MATRICULE` int(10) NOT NULL,
  `MODELE` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TYPE` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COULEUR` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NIVEAUCONFORT` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PLAQUEIMMATRICULATION`),
  KEY `I_FK_UTILISATEUR` (`MATRICULE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
