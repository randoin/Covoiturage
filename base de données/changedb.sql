ALTER TABLE  `covoiturage` ADD  `CONDUCTEUR` INT( 5 ) NOT NULL AFTER  `NUMEROCOVOIT` ;
ALTER TABLE  `covoiturage` ADD  `HEUREDEPART` VARCHAR( 20 ) NOT NULL ;

ALTER TABLE  `demandercovoiturage` CHANGE  `NUMEROCOVOIT`  `NUMEROCOVOIT` INT( 5 ) NOT NULL ;
ALTER TABLE  `demandercovoiturage` CHANGE  `MATRICULE`  `MATRICULE` INT( 5 ) NOT NULL ;
ALTER TABLE  `etrepassager` CHANGE  `MATRICULE`  `MATRICULE` INT( 5 ) NOT NULL ;
ALTER TABLE  `etrepassager` CHANGE  `NUMEROCOVOIT`  `NUMEROCOVOIT` INT( 5 ) NOT NULL ;
