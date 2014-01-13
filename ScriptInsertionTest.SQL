------------------------------------------
-- Script de test de la base de données --
--   Insertion de données dans la base  --
------------------------------------------

------------------------------------------
--             UTILISATEUR              --
------------------------------------------

SELECT * FROM UTILISATEUR;

INSERT INTO UTILISATEUR VALUES 
	('1', 'NOM1', 'PRENOM1', 'LOGIN1', 'MDP1', 'ADRESSE@NETWORK.COM', '0612345678');
INSERT INTO UTILISATEUR VALUES 
	('2', 'NOM2', 'PRENOM2', 'LOGIN2', 'MDP2', 'ADRESSE@NETWORK.COM', '0622345678');
INSERT INTO UTILISATEUR VALUES 
	('3', 'NOM3', 'PRENOM3', '3OGIN2', 'MDP2', 'ADRESSE@NETWORK.COM', '0633345678');

SELECT * FROM UTILISATEUR;

