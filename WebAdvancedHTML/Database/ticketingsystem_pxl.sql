-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 17 apr 2016 om 17:48
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

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `blokken`
--

DROP TABLE IF EXISTS `blokken`;
CREATE TABLE `blokken` (
  `blokID` int(5) NOT NULL,
  `campus` int(5) NOT NULL,
  `blokLetter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `blokken`
--

INSERT INTO `blokken` (`blokID`, `campus`, `blokLetter`) VALUES
(1, 1, 'B');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `campussen`
--

DROP TABLE IF EXISTS `campussen`;
CREATE TABLE `campussen` (
  `campusID` int(5) NOT NULL,
  `naam` varchar(255) NOT NULL
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
CREATE TABLE `lokalen` (
  `lokaalNummer` int(5) NOT NULL,
  `blok` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `lokalen`
--

INSERT INTO `lokalen` (`lokaalNummer`, `blok`) VALUES
(41, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `ticketID` int(5) NOT NULL,
  `aanmaker` int(3) NOT NULL,
  `onderwerp` varchar(500) NOT NULL,
  `prioriteit` enum('Kritiek (1 uur)','Dringend (4 uur)','Hoog (2 dagen)','Gemiddeld (1 week)','Laag (3 maanden)') NOT NULL,
  `type` enum('IT','Elektriciteit','Faciliteiten','') NOT NULL,
  `campus` int(5) NOT NULL,
  `blok` int(5) NOT NULL,
  `lokaal` int(5) NOT NULL,
  `datum` date NOT NULL,
  `omschrijving` varchar(1024) NOT NULL,
  `bijlage` blob NOT NULL,
  `herstellingDatum` date NOT NULL,
  `deadline` date NOT NULL,
  `hersteller` int(11) NOT NULL,
  `status` enum('Geparkeerd','Afgesloten','In behandeling','Geannuleerd') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userID` int(3) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pws` varchar(50) NOT NULL,
  `rol` enum('Admin','Dispatcher','Werkman','Medewerker','Docent','Schoonmaak medewerker') NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vragenlijsten`
--

DROP TABLE IF EXISTS `vragenlijsten`;
CREATE TABLE `vragenlijsten` (
  `vragenlijstID` int(5) NOT NULL,
  `vraag1` int(5) NOT NULL,
  `vraag2` int(5) NOT NULL,
  `vraag3` varchar(1024) NOT NULL,
  `user` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `blokken`
--
ALTER TABLE `blokken`
  ADD PRIMARY KEY (`blokID`),
  ADD KEY `campusID` (`campus`),
  ADD KEY `campus` (`campus`);

--
-- Indexen voor tabel `campussen`
--
ALTER TABLE `campussen`
  ADD PRIMARY KEY (`campusID`);

--
-- Indexen voor tabel `lokalen`
--
ALTER TABLE `lokalen`
  ADD PRIMARY KEY (`lokaalNummer`),
  ADD KEY `blok` (`blok`);

--
-- Indexen voor tabel `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticketID`),
  ADD UNIQUE KEY `userID` (`aanmaker`),
  ADD UNIQUE KEY `lokaalID` (`lokaal`),
  ADD UNIQUE KEY `campusID` (`campus`),
  ADD UNIQUE KEY `blokID` (`blok`),
  ADD KEY `aanmaker` (`aanmaker`),
  ADD KEY `hersteller` (`hersteller`),
  ADD KEY `lokaal` (`lokaal`),
  ADD KEY `campus` (`campus`),
  ADD KEY `blok` (`blok`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexen voor tabel `vragenlijsten`
--
ALTER TABLE `vragenlijsten`
  ADD PRIMARY KEY (`vragenlijstID`),
  ADD KEY `user` (`user`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticketID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `vragenlijsten`
--
ALTER TABLE `vragenlijsten`
  MODIFY `vragenlijstID` int(5) NOT NULL AUTO_INCREMENT;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `blokken`
--
ALTER TABLE `blokken`
  ADD CONSTRAINT `blok_campus_fk` FOREIGN KEY (`campus`) REFERENCES `campussen` (`campusID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `lokalen`
--
ALTER TABLE `lokalen`
  ADD CONSTRAINT `lokaal_blok_fk` FOREIGN KEY (`blok`) REFERENCES `blokken` (`blokID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `ticket_aanmaker_fk` FOREIGN KEY (`aanmaker`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_blok_fk` FOREIGN KEY (`blok`) REFERENCES `blokken` (`blokID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_campus_fk` FOREIGN KEY (`campus`) REFERENCES `campussen` (`campusID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_hersteller_fk` FOREIGN KEY (`hersteller`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_lokaal_fk` FOREIGN KEY (`lokaal`) REFERENCES `lokalen` (`lokaalNummer`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `vragenlijsten`
--
ALTER TABLE `vragenlijsten`
  ADD CONSTRAINT `vragenlijst_user_fk` FOREIGN KEY (`user`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
