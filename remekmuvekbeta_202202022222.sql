﻿--
-- Script was generated by Devart dbForge Studio 2020 for MySQL, Version 9.0.688.0
-- Product home page: http://www.devart.com/dbforge/mysql/studio
-- Script date 2022. 02. 02. 22:22:10
-- Server version: 10.4.22
-- Client version: 4.1
--

-- 
-- Disable foreign keys
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Set SQL mode
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Set character set the client will use to send SQL statements to the server
--
SET NAMES 'utf8';

DROP DATABASE IF EXISTS remekmuvekbeta;

CREATE DATABASE remekmuvekbeta
	CHARACTER SET utf8
	COLLATE utf8_hungarian_ci;

--
-- Set default database
--
USE remekmuvekbeta;

--
-- Create table `varosok`
--
CREATE TABLE varosok (
  varos_id INT(11) NOT NULL AUTO_INCREMENT,
  varos VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (varos_id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 26,
AVG_ROW_LENGTH = 655,
CHARACTER SET utf8,
COLLATE utf8_hungarian_ci;

--
-- Create table `stilusok`
--
CREATE TABLE stilusok (
  stilus_id INT(11) NOT NULL AUTO_INCREMENT,
  stilus VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (stilus_id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 4,
AVG_ROW_LENGTH = 5461,
CHARACTER SET utf8,
COLLATE utf8_hungarian_ci;

--
-- Create table `orszagok`
--
CREATE TABLE orszagok (
  orszag_id INT(11) NOT NULL AUTO_INCREMENT,
  orszag VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (orszag_id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 10,
AVG_ROW_LENGTH = 1820,
CHARACTER SET utf8,
COLLATE utf8_hungarian_ci;

--
-- Create table `kategoriak`
--
CREATE TABLE kategoriak (
  kat_id INT(11) NOT NULL AUTO_INCREMENT,
  kategoria VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (kat_id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 5,
AVG_ROW_LENGTH = 4096,
CHARACTER SET utf8,
COLLATE utf8_hungarian_ci;

--
-- Create table `remekmuvek`
--
CREATE TABLE remekmuvek (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nev VARCHAR(255) DEFAULT NULL,
  leiras VARCHAR(255) DEFAULT NULL,
  varos_id INT(11) DEFAULT NULL,
  orszag_id INT(11) DEFAULT NULL,
  stilus_id INT(11) DEFAULT NULL,
  kategoria_id INT(11) DEFAULT NULL,
  kep1 VARCHAR(255) DEFAULT NULL,
  kep2 VARCHAR(255) DEFAULT NULL,
  kep3 VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 4,
AVG_ROW_LENGTH = 16384,
CHARACTER SET utf8,
COLLATE utf8_hungarian_ci;

--
-- Create foreign key
--
ALTER TABLE remekmuvek 
  ADD CONSTRAINT FK_remekmuvek_kategoriak_kat_id FOREIGN KEY (kategoria_id)
    REFERENCES kategoriak(kat_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create foreign key
--
ALTER TABLE remekmuvek 
  ADD CONSTRAINT FK_remekmuvek_orszagok_orszag_id FOREIGN KEY (orszag_id)
    REFERENCES orszagok(orszag_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create foreign key
--
ALTER TABLE remekmuvek 
  ADD CONSTRAINT FK_remekmuvek_stilusok_stilus_id FOREIGN KEY (stilus_id)
    REFERENCES stilusok(stilus_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create foreign key
--
ALTER TABLE remekmuvek 
  ADD CONSTRAINT FK_remekmuvek_varosok_varos_id FOREIGN KEY (varos_id)
    REFERENCES varosok(varos_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create table `felhasznalok`
--
CREATE TABLE felhasznalok (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nev VARCHAR(255) DEFAULT NULL,
  felhasznalonev VARCHAR(255) DEFAULT NULL,
  email VARCHAR(50) DEFAULT NULL,
  passwd VARCHAR(255) DEFAULT NULL,
  jogosultsag ENUM('Szerkesztő','Felhasználó') DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 2,
AVG_ROW_LENGTH = 16384,
CHARACTER SET utf8,
COLLATE utf8_hungarian_ci;

-- 
-- Dumping data for table varosok
--
INSERT INTO varosok VALUES
(1, 'Ravenna'),
(2, 'Isztambul'),
(3, 'Moszkva'),
(4, 'Hildesheim'),
(5, 'Firenze'),
(6, 'Pisa'),
(7, 'Pannonhalma'),
(8, 'Ják'),
(9, 'Esztergom'),
(10, 'Párizs'),
(11, 'Milánó'),
(12, 'Amiens'),
(13, 'Velence'),
(14, 'Vajdahunyad'),
(15, 'Róma'),
(16, 'Visegrád'),
(17, 'Autun'),
(18, 'Kalocsa'),
(19, 'Székesfehérvár'),
(20, 'Budapest'),
(21, 'Naumburg'),
(22, 'Barcelona'),
(23, 'Krakkó'),
(24, 'Kassa'),
(25, 'Nincsen adat!');

-- 
-- Dumping data for table stilusok
--
INSERT INTO stilusok VALUES
(1, 'Gótikus'),
(2, 'Román'),
(3, 'Nincsen adat!');

-- 
-- Dumping data for table orszagok
--
INSERT INTO orszagok VALUES
(1, 'Olaszország'),
(2, 'Németország'),
(3, 'Oroszország'),
(4, 'Magyarország'),
(5, 'Franciaország'),
(6, 'Spanyolország'),
(7, 'Egyesült Királyság'),
(8, 'Lenygelország'),
(9, 'Nincsen adat!');

-- 
-- Dumping data for table kategoriak
--
INSERT INTO kategoriak VALUES
(1, 'Építészet'),
(2, 'Szobrászat'),
(3, 'Festészet'),
(4, 'Nincsen adat!');

-- 
-- Dumping data for table remekmuvek
--
INSERT INTO remekmuvek VALUES
(1, 'STAR WARS', '1849484894848484848 R2D2', 2, 9, 3, 4, '61fadf40d62337.25984180.jpg', '61fadf40d62384.54664739.jpg', '61fadf40d62397.29893504.jpg');

-- 
-- Dumping data for table felhasznalok
--
INSERT INTO felhasznalok VALUES
(1, 'Dobrosi Gergő', 'gergo', '$2y$10$zLWRdlqhzTs65TCINxnfW.CqNTmG6Av2Npu4dZrLByC', 'asd@asd.com', 'Szerkesztő');

-- 
-- Restore previous SQL mode
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Enable foreign keys
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;