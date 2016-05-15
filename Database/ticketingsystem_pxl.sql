-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 29 apr 2016 om 14:07
-- Serverversie: 10.1.10-MariaDB
-- PHP-versie: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketingsystem@pxl`
--
CREATE DATABASE IF NOT EXISTS `ticketingsystem@pxl` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ticketingsystem@pxl`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `blokken`
--

DROP TABLE IF EXISTS `blokken`;
CREATE TABLE IF NOT EXISTS `blokken` (
  `blokID` int(5) NOT NULL,
  `campusID` int(5) NOT NULL,
  `blokLetter` varchar(255) NOT NULL,
  PRIMARY KEY (`blokID`),
  KEY `campusID` (`campusID`),
  KEY `campus` (`campusID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `blokken`
--

INSERT INTO `blokken` (`blokID`, `campusID`, `blokLetter`) VALUES
(1, 1, 'B');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `campussen`
--

DROP TABLE IF EXISTS `campussen`;
CREATE TABLE IF NOT EXISTS `campussen` (
  `campusID` int(5) NOT NULL,
  `naam` varchar(255) NOT NULL,
  PRIMARY KEY (`campusID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `campussen`
--

INSERT INTO `campussen` (`campusID`, `naam`) VALUES
(1, 'Elfde Linie');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lokalen`
--

DROP TABLE IF EXISTS `lokalen`;
CREATE TABLE IF NOT EXISTS `lokalen` (
  `lokaalNummer` int(5) NOT NULL,
  `blokID` int(5) NOT NULL,
  PRIMARY KEY (`lokaalNummer`),
  KEY `blok` (`blokID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `lokalen`
--

INSERT INTO `lokalen` (`lokaalNummer`, `blokID`) VALUES
(41, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `ticketID` int(5) NOT NULL AUTO_INCREMENT,
  `aanmaker` int(3) NOT NULL,
  `onderwerp` varchar(500) NOT NULL,
  `prioriteit` enum('Kritiek (1 uur)','Dringend (4 uur)','Hoog (2 dagen)','Gemiddeld (1 week)','Laag (3 maanden)') NOT NULL,
  `type` enum('IT','Elektriciteit','Faciliteiten','') NOT NULL,
  `campusID` int(5) NOT NULL,
  `blokID` int(5) NOT NULL,
  `lokaalNummer` int(5) NOT NULL,
  `datum` date NOT NULL,
  `omschrijving` varchar(1024) NOT NULL,
  `bijlage` blob NOT NULL,
  `herstellingDatum` date NOT NULL,
  `deadline` date NOT NULL,
  `hersteller` int(11) NOT NULL,
  `status` enum('Geparkeerd','Afgesloten','In behandeling','Geannuleerd') NOT NULL,
  PRIMARY KEY (`ticketID`),
  KEY `userID` (`aanmaker`),
  KEY `lokaalID` (`lokaalNummer`),
  KEY `campusID` (`campusID`),
  KEY `blokID` (`blokID`),
  KEY `aanmaker` (`aanmaker`),
  KEY `hersteller` (`hersteller`),
  KEY `lokaal` (`lokaalNummer`),
  KEY `campus` (`campusID`),
  KEY `blok` (`blokID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tickets`
--

INSERT INTO `tickets` (`ticketID`, `aanmaker`, `onderwerp`, `prioriteit`, `type`, `campusID`, `blokID`, `lokaalNummer`, `datum`, `omschrijving`, `bijlage`, `herstellingDatum`, `deadline`, `hersteller`, `status`) VALUES
(1, 4, 'Beamer kapot', 'Kritiek (1 uur)', 'Elektriciteit', 1, 1, 41, '2016-04-28', 'Beamer gaat niet meer aan.', '', '2016-04-29', '2016-05-02', 3, 'In behandeling');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(3) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pws` varchar(50) NOT NULL,
  `rol` enum('Admin','Dispatcher','Werkman','Medewerker','Docent','Schoonmaak medewerker') NOT NULL,
  `active` tinyint(1) NOT NULL,
  `salt` varchar(1024) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--
-- ww zijn: 1=admin, 2=pxl, 3=pxl, 4=pxl
INSERT INTO `users` (`userID`, `email`, `pws`, `rol`, `active`, `salt`) VALUES
(1, 'admin@pxl.be', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 1, ''),
(2, 'dis@pxl.be', 'ab642ce62f55b2ca05b4697f3bd7b53a', 'Dispatcher', 1, ''),
(3, 'wm1@pxl.be', 'ab642ce62f55b2ca05b4697f3bd7b53a', 'Werkman', 1, ''),
(4, 'docent1@pxl.be', 'ab642ce62f55b2ca05b4697f3bd7b53a', 'Docent', 1, '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vragen`
--

DROP TABLE IF EXISTS `vragen`;
CREATE TABLE IF NOT EXISTS `vragen` (
  `vragenID` int(5) NOT NULL AUTO_INCREMENT,
  `vraag_text` varchar(255) NOT NULL,
`antw1_text` varchar(255) NOT NULL,
`antw2_text` varchar(255) NOT NULL,
`antw3_text` varchar(255) NOT NULL,
`antw4_text` varchar(255) NOT NULL,
PRIMARY KEY (`vragenID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Vragen`
--

INSERT INTO `vragen` (`vragenID`,`vraag_text`,`antw1_text`,`antw2_text`,`antw3_text`,`antw4_text`) VALUES
(1,'Was alles duidelijk bij het ingeven van een probleem', 'Ja','Soms','Nee',NULL),(2,'Wat vind u van de interface','Geweldig','Duidelijk','Neutraal','Kan beter'),(3,'Geef je mening wat beter kan','NULL',NULL,NULL,NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `antwoorden`
--

DROP TABLE IF EXISTS `antwoorden`;
CREATE TABLE IF NOT EXISTS `antwoorden` (
  `antwoordID` int(5) NOT NULL AUTO_INCREMENT,
`vraagID` int(5) NOT NULL,
  `antwoord_text` varchar(255) NOT NULL,
  PRIMARY KEY (`antwoordID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- -------------------------------------------------------
--
-- Gegevens worden geëxporteerd voor tabel `vraagEnAntw`
--

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `blokken`
--
ALTER TABLE `blokken`
  ADD CONSTRAINT `blok_campus_fk` FOREIGN KEY (`campusID`) REFERENCES `campussen` (`campusID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `lokalen`
--
ALTER TABLE `lokalen`
  ADD CONSTRAINT `lokaal_blok_fk` FOREIGN KEY (`blokID`) REFERENCES `blokken` (`blokID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `antwoorden`
--
-- ALTER TABLE `antwoorden`
--   ADD CONSTRAINT `vraag_fk` FOREIGN KEY (`vraagID`) -- REFERENCES `vragen` (`vraagID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `ticket_aanmaker_fk` FOREIGN KEY (`aanmaker`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_blok_fk` FOREIGN KEY (`blokID`) REFERENCES `blokken` (`blokID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_campus_fk` FOREIGN KEY (`campusID`) REFERENCES `campussen` (`campusID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_hersteller_fk` FOREIGN KEY (`hersteller`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_lokaal_fk` FOREIGN KEY (`lokaalNummer`) REFERENCES `lokalen` (`lokaalNummer`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
