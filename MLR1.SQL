-- -----------------------------------------------------------------------------
--             Génération d'une base de données pour
--                      Oracle Version 10g
--                        (13/1/2014 10:33:22)
-- -----------------------------------------------------------------------------
--      Nom de la base : MLR2
--      Projet : 
--      Auteur : IUT DE CAEN
--      Date de dernière modification : 13/1/2014 10:33:14
-- -----------------------------------------------------------------------------

DROP TABLE UTILISATEUR CASCADE CONSTRAINTS;

DROP TABLE LIEU CASCADE CONSTRAINTS;

DROP TABLE COVOITURAGE CASCADE CONSTRAINTS;

DROP TABLE ETREPASSAGER CASCADE CONSTRAINTS;

DROP TABLE PASSERPAR CASCADE CONSTRAINTS;

-- -----------------------------------------------------------------------------
--       CREATION DE LA BASE 
-- -----------------------------------------------------------------------------

CREATE DATABASE MLR2;

-- -----------------------------------------------------------------------------
--       TABLE : UTILISATEUR
-- -----------------------------------------------------------------------------

CREATE TABLE UTILISATEUR
   (
    MATRICULE CHAR(32)  NOT NULL,
    NOM CHAR(32)  NULL,
    PRENOM CHAR(32)  NULL,
    LOGIN CHAR(32)  NULL,
    MOTDEPASSE CHAR(32)  NULL,
    ADRESSEMAIL CHAR(32)  NULL
,   CONSTRAINT PK_UTILISATEUR PRIMARY KEY (MATRICULE)  
   ) ;

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
--       TABLE : COVOITURAGE
-- -----------------------------------------------------------------------------

CREATE TABLE COVOITURAGE
   (
    NUMEROCOVOIT CHAR(32)  NOT NULL,
    MATRICULE CHAR(32)  NOT NULL,
    IDENTIFIANTLIEU CHAR(32)  NOT NULL,
    IDENTIFIANTLIEU_ARRIVEE CHAR(32)  NOT NULL,
    PLACESDISPO CHAR(32)  NULL,
    DATEDEPART CHAR(32)  NULL
,   CONSTRAINT PK_COVOITURAGE PRIMARY KEY (NUMEROCOVOIT)  
   ) ;

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE COVOITURAGE
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_COVOITURAGE_UTILISATEUR
     ON COVOITURAGE (MATRICULE ASC)
    ;

CREATE  INDEX I_FK_COVOITURAGE_LIEU
     ON COVOITURAGE (IDENTIFIANTLIEU ASC)
    ;

CREATE  INDEX I_FK_COVOITURAGE_LIEU1
     ON COVOITURAGE (IDENTIFIANTLIEU_ARRIVEE ASC)
    ;

-- -----------------------------------------------------------------------------
--       TABLE : ETREPASSAGER
-- -----------------------------------------------------------------------------

CREATE TABLE ETREPASSAGER
   (
    MATRICULE CHAR(32)  NOT NULL,
    NUMEROCOVOIT CHAR(32)  NOT NULL
,   CONSTRAINT PK_ETREPASSAGER PRIMARY KEY (MATRICULE, NUMEROCOVOIT)  
   ) ;

-- -----------------------------------------------------------------------------
--       INDEX DE LA TABLE ETREPASSAGER
-- -----------------------------------------------------------------------------

CREATE  INDEX I_FK_ETREPASSAGER_UTILISATEUR
     ON ETREPASSAGER (MATRICULE ASC)
    ;

CREATE  INDEX I_FK_ETREPASSAGER_COVOITURAGE
     ON ETREPASSAGER (NUMEROCOVOIT ASC)
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
--       CREATION DES REFERENCES DE TABLE
-- -----------------------------------------------------------------------------


ALTER TABLE COVOITURAGE ADD (
     CONSTRAINT FK_COVOITURAGE_UTILISATEUR
          FOREIGN KEY (MATRICULE)
               REFERENCES UTILISATEUR (MATRICULE))   ;

ALTER TABLE COVOITURAGE ADD (
     CONSTRAINT FK_COVOITURAGE_LIEU
          FOREIGN KEY (IDENTIFIANTLIEU)
               REFERENCES LIEU (IDENTIFIANTLIEU))   ;

ALTER TABLE COVOITURAGE ADD (
     CONSTRAINT FK_COVOITURAGE_LIEU1
          FOREIGN KEY (IDENTIFIANTLIEU_ARRIVEE)
               REFERENCES LIEU (IDENTIFIANTLIEU))   ;

ALTER TABLE ETREPASSAGER ADD (
     CONSTRAINT FK_ETREPASSAGER_UTILISATEUR
          FOREIGN KEY (MATRICULE)
               REFERENCES UTILISATEUR (MATRICULE))   ;

ALTER TABLE ETREPASSAGER ADD (
     CONSTRAINT FK_ETREPASSAGER_COVOITURAGE
          FOREIGN KEY (NUMEROCOVOIT)
               REFERENCES COVOITURAGE (NUMEROCOVOIT))   ;

ALTER TABLE PASSERPAR ADD (
     CONSTRAINT FK_PASSERPAR_COVOITURAGE
          FOREIGN KEY (NUMEROCOVOIT)
               REFERENCES COVOITURAGE (NUMEROCOVOIT))   ;

ALTER TABLE PASSERPAR ADD (
     CONSTRAINT FK_PASSERPAR_LIEU
          FOREIGN KEY (IDENTIFIANTLIEU)
               REFERENCES LIEU (IDENTIFIANTLIEU))   ;


-- -----------------------------------------------------------------------------
--                FIN DE GENERATION
-- -----------------------------------------------------------------------------