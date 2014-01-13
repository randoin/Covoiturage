-- -----------------------------------------------------------------------------
--             Génération d'une base de données pour
--                      Oracle Version 10g
--                        (13/1/2014 11:57:42)
-- -----------------------------------------------------------------------------
--      Nom de la base : MLR8
--      Projet : 
--      Auteur : IUT DE CAEN
--      Date de dernière modification : 13/1/2014 11:57:37
-- -----------------------------------------------------------------------------

DROP TABLE UTILISATEUR CASCADE CONSTRAINTS;

DROP TABLE LIEU CASCADE CONSTRAINTS;

DROP TABLE VEHICULE CASCADE CONSTRAINTS;

DROP TABLE COVOITURAGE CASCADE CONSTRAINTS;

DROP TABLE PASSERPAR CASCADE CONSTRAINTS;

DROP TABLE ETREPASSAGER CASCADE CONSTRAINTS;

-- -----------------------------------------------------------------------------
--       CREATION DE LA BASE 
-- -----------------------------------------------------------------------------

CREATE DATABASE MLR8;

-- -----------------------------------------------------------------------------
--       TABLE : UTILISATEUR
-- -----------------------------------------------------------------------------

CREATE TABLE UTILISATEUR
   (
    MATRICULE CHAR(32)  NOT NULL,
    NUMEROCOVOIT CHAR(32)  NOT NULL,
    NOM CHAR(32)  NULL,
    PRENOM CHAR(32)  NULL,
    LOGIN CHAR(32)  NULL,
    MOTDEPASSE CHAR(32)  NULL,
    ADRESSEMAIL CHAR(32)  NULL,
    NUMEROTEL CHAR(32)  NULL
,   CONSTRAINT PK_UTILISATEUR PRIMARY KEY (MATRICULE)  
   ) ;

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE UTILISATEUR
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_UTILISATEUR_COVOITURAGE
     ON UTILISATEUR (NUMEROCOVOIT ASC)
    ;

-- -----------------------------------------------------------------------------
--       TABLE : LIEU
-- -----------------------------------------------------------------------------

CREATE TABLE LIEU
   (
    IDENTIFIANTLIEU CHAR(32)  NOT NULL,
    NOMVILLE CHAR(32)  NULL
,   CONSTRAINT PK_LIEU PRIMARY KEY (IDENTIFIANTLIEU)  
   ) ;

-- -----------------------------------------------------------------------------
--       TABLE : VEHICULE
-- -----------------------------------------------------------------------------

CREATE TABLE VEHICULE
   (
    PLAQUEIMMATRICULATION CHAR(32)  NOT NULL,
    MATRICULE CHAR(32)  NOT NULL,
    MODELE CHAR(32)  NULL,
    TYPE CHAR(32)  NULL,
    COULEUR CHAR(32)  NULL,
    NIVEAUCONFORT CHAR(32)  NULL
,   CONSTRAINT PK_VEHICULE PRIMARY KEY (PLAQUEIMMATRICULATION)  
   ) ;

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE VEHICULE
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_VEHICULE_UTILISATEUR
     ON VEHICULE (MATRICULE ASC)
    ;

-- -----------------------------------------------------------------------------
--       TABLE : COVOITURAGE
-- -----------------------------------------------------------------------------

CREATE TABLE COVOITURAGE
   (
    NUMEROCOVOIT CHAR(32)  NOT NULL,
    PLAQUEIMMATRICULATION CHAR(32)  NOT NULL,
    IDENTIFIANTLIEU CHAR(32)  NOT NULL,
    IDENTIFIANTLIEU_ARRIVEE CHAR(32)  NOT NULL,
    PLACESDISPO CHAR(32)  NULL,
    DATEDEPART CHAR(32)  NULL,
    MONTANTPARPLACE CHAR(32)  NULL
,   CONSTRAINT PK_COVOITURAGE PRIMARY KEY (NUMEROCOVOIT)  
   ) ;

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE COVOITURAGE
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_COVOITURAGE_VEHICULE
     ON COVOITURAGE (PLAQUEIMMATRICULATION ASC)
    ;

CREATE  INDEX I_FK_COVOITURAGE_LIEU
     ON COVOITURAGE (IDENTIFIANTLIEU ASC)
    ;

CREATE  INDEX I_FK_COVOITURAGE_LIEU1
     ON COVOITURAGE (IDENTIFIANTLIEU_ARRIVEE ASC)
    ;

-- -----------------------------------------------------------------------------
--       TABLE : PASSERPAR
-- -----------------------------------------------------------------------------

CREATE TABLE PASSERPAR
   (
    NUMEROCOVOIT CHAR(32)  NOT NULL,
    IDENTIFIANTLIEU CHAR(32)  NOT NULL
,   CONSTRAINT PK_PASSERPAR PRIMARY KEY (NUMEROCOVOIT, IDENTIFIANTLIEU)  
   ) ;

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE PASSERPAR
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_PASSERPAR_COVOITURAGE
     ON PASSERPAR (NUMEROCOVOIT ASC)
    ;

CREATE  INDEX I_FK_PASSERPAR_LIEU
     ON PASSERPAR (IDENTIFIANTLIEU ASC)
    ;

-- -----------------------------------------------------------------------------
--       TABLE : ETREPASSAGER
-- -----------------------------------------------------------------------------

CREATE TABLE ETREPASSAGER
   (
    NUMEROCOVOIT CHAR(32)  NOT NULL,
    MATRICULE CHAR(32)  NOT NULL
,   CONSTRAINT PK_ETREPASSAGER PRIMARY KEY (NUMEROCOVOIT, MATRICULE)  
   ) ;

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE ETREPASSAGER
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_ETREPASSAGER_COVOITURAGE
     ON ETREPASSAGER (NUMEROCOVOIT ASC)
    ;

CREATE  INDEX I_FK_ETREPASSAGER_UTILISATEUR
     ON ETREPASSAGER (MATRICULE ASC)
    ;


-- -----------------------------------------------------------------------------
--       CREATION DES REFERENCES DE TABLE
-- -----------------------------------------------------------------------------


ALTER TABLE UTILISATEUR ADD (
     CONSTRAINT FK_UTILISATEUR_COVOITURAGE
          FOREIGN KEY (NUMEROCOVOIT)
               REFERENCES COVOITURAGE (NUMEROCOVOIT))   ;

ALTER TABLE VEHICULE ADD (
     CONSTRAINT FK_VEHICULE_UTILISATEUR
          FOREIGN KEY (MATRICULE)
               REFERENCES UTILISATEUR (MATRICULE))   ;

ALTER TABLE COVOITURAGE ADD (
     CONSTRAINT FK_COVOITURAGE_VEHICULE
          FOREIGN KEY (PLAQUEIMMATRICULATION)
               REFERENCES VEHICULE (PLAQUEIMMATRICULATION))   ;

ALTER TABLE COVOITURAGE ADD (
     CONSTRAINT FK_COVOITURAGE_LIEU
          FOREIGN KEY (IDENTIFIANTLIEU)
               REFERENCES LIEU (IDENTIFIANTLIEU))   ;

ALTER TABLE COVOITURAGE ADD (
     CONSTRAINT FK_COVOITURAGE_LIEU1
          FOREIGN KEY (IDENTIFIANTLIEU_ARRIVEE)
               REFERENCES LIEU (IDENTIFIANTLIEU))   ;

ALTER TABLE PASSERPAR ADD (
     CONSTRAINT FK_PASSERPAR_COVOITURAGE
          FOREIGN KEY (NUMEROCOVOIT)
               REFERENCES COVOITURAGE (NUMEROCOVOIT))   ;

ALTER TABLE PASSERPAR ADD (
     CONSTRAINT FK_PASSERPAR_LIEU
          FOREIGN KEY (IDENTIFIANTLIEU)
               REFERENCES LIEU (IDENTIFIANTLIEU))   ;

ALTER TABLE ETREPASSAGER ADD (
     CONSTRAINT FK_ETREPASSAGER_COVOITURAGE
          FOREIGN KEY (NUMEROCOVOIT)
               REFERENCES COVOITURAGE (NUMEROCOVOIT))   ;

ALTER TABLE ETREPASSAGER ADD (
     CONSTRAINT FK_ETREPASSAGER_UTILISATEUR
          FOREIGN KEY (MATRICULE)
               REFERENCES UTILISATEUR (MATRICULE))   ;


-- -----------------------------------------------------------------------------
--                FIN DE GENERATION
-- -----------------------------------------------------------------------------