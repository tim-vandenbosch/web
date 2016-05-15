-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 15 mei 2016 om 03:23
-- Serverversie: 10.1.10-MariaDB
-- PHP-versie: 7.0.3

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
-- Tabelstructuur voor tabel `antwoorden`
--

CREATE TABLE `antwoorden` (
  `antwoordID` int(5) NOT NULL,
  `vraagID` int(5) NOT NULL,
  `antwoord_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `blokken`
--

CREATE TABLE `blokken` (
  `blokID` int(5) NOT NULL,
  `campusID` int(5) NOT NULL,
  `blokLetter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `blokken`
--

INSERT INTO `blokken` (`blokID`, `campusID`, `blokLetter`) VALUES
(1, 1, 'B'),
(2, 1, 'A'),
(3, 1, 'C'),
(4, 1, 'D'),
(5, 1, 'E'),
(6, 1, 'F'),
(7, 1, 'G');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `campussen`
--

CREATE TABLE `campussen` (
  `campusID` int(5) NOT NULL,
  `naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `campussen`
--

INSERT INTO `campussen` (`campusID`, `naam`) VALUES
(1, 'Elfde Linie'),
(2, 'Guffenslaan'),
(3, 'Vildersstraat'),
(4, 'Quartier Canal'),
(5, 'Diepenbeek');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lokalen`
--

CREATE TABLE `lokalen` (
  `lokaalNummer` int(5) NOT NULL,
  `blokID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `lokalen`
--

INSERT INTO `lokalen` (`lokaalNummer`, `blokID`) VALUES
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(141, 1),
(142, 1),
(143, 1),
(145, 1),
(144, 2),
(146, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tickets`
--

CREATE TABLE `tickets` (
  `ticketID` int(5) NOT NULL,
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
  `aanmaker` int(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tickets`
--

INSERT INTO `tickets` (`ticketID`, `onderwerp`, `prioriteit`, `type`, `campusID`, `blokID`, `lokaalNummer`, `datum`, `omschrijving`, `bijlage`, `herstellingDatum`, `deadline`, `hersteller`, `status`, `aanmaker`) VALUES
(1, 'Beamer kapot', 'Kritiek (1 uur)', 'Elektriciteit', 1, 1, 41, '2016-04-28', 'Beamer gaat niet meer aan.', '', '2016-04-29', '2016-05-02', 3, 'In behandeling', NULL),
(2, 'Stoel kapot', 'Gemiddeld (1 week)', 'Faciliteiten', 2, 2, 45, '2016-05-02', 'Een stoelpoot is afgebroken.', '', '2016-05-06', '2016-05-09', 2, 'In behandeling', NULL),
(3, 'Licht flikkert', 'Hoog (2 dagen)', 'Elektriciteit', 4, 3, 44, '2016-05-13', 'Een lamp moet dringend vervangen worden. Deze flikkerde tijdens de avondles.', '', '2016-05-16', '2016-05-17', 3, 'Geparkeerd', NULL),
(4, 'Raam gebarsten', 'Dringend (4 uur)', 'Faciliteiten', 3, 4, 146, '2016-04-18', 'Door een ongeluk is een raam gebarsten. ', '', '2016-04-19', '2016-04-19', 1, 'Geparkeerd', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `userID` int(3) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pws` varchar(50) NOT NULL,
  `rol` enum('Admin','Dispatcher','Werkman','Medewerker','Docent','Schoonmaak medewerker') NOT NULL,
  `active` tinyint(1) NOT NULL,
  `salt` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`userID`, `email`, `pws`, `rol`, `active`, `salt`) VALUES
(1, 'admin@pxl.be', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 1, ''),
(2, 'dis@pxl.be', 'ab642ce62f55b2ca05b4697f3bd7b53a', 'Dispatcher', 1, ''),
(3, 'wm1@pxl.be', 'ab642ce62f55b2ca05b4697f3bd7b53a', 'Werkman', 1, ''),
(4, 'docent1@pxl.be', 'ab642ce62f55b2ca05b4697f3bd7b53a', 'Docent', 1, '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vragen`
--

CREATE TABLE `vragen` (
  `vragenID` int(5) NOT NULL,
  `vraag_text` varchar(255) NOT NULL,
  `antw1_text` varchar(255) NOT NULL,
  `antw2_text` varchar(255) NOT NULL,
  `antw3_text` varchar(255) NOT NULL,
  `antw4_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `vragen`
--

INSERT INTO `vragen` (`vragenID`, `vraag_text`, `antw1_text`, `antw2_text`, `antw3_text`, `antw4_text`) VALUES
(1, 'Was alles duidelijk bij het ingeven van een probleem', 'Ja', 'Soms', 'Nee', ''),
(2, 'Wat vind u van de interface', 'Geweldig', 'Duidelijk', 'Neutraal', 'Kan beter'),
(3, 'Geef je mening wat beter kan', 'NULL', '', '', '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `antwoorden`
--
ALTER TABLE `antwoorden`
  ADD PRIMARY KEY (`antwoordID`);

--
-- Indexen voor tabel `blokken`
--
ALTER TABLE `blokken`
  ADD PRIMARY KEY (`blokID`),
  ADD KEY `campusID` (`campusID`),
  ADD KEY `campus` (`campusID`);

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
  ADD KEY `blok` (`blokID`);

--
-- Indexen voor tabel `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticketID`),
  ADD UNIQUE KEY `lokaalID` (`lokaalNummer`),
  ADD UNIQUE KEY `campusID` (`campusID`),
  ADD UNIQUE KEY `blokID` (`blokID`),
  ADD UNIQUE KEY `ticketID` (`ticketID`),
  ADD KEY `hersteller` (`hersteller`),
  ADD KEY `lokaal` (`lokaalNummer`),
  ADD KEY `campus` (`campusID`),
  ADD KEY `blok` (`blokID`),
  ADD KEY `tickets_aanmaker_FK` (`aanmaker`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexen voor tabel `vragen`
--
ALTER TABLE `vragen`
  ADD PRIMARY KEY (`vragenID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `antwoorden`
--
ALTER TABLE `antwoorden`
  MODIFY `antwoordID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticketID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT voor een tabel `vragen`
--
ALTER TABLE `vragen`
  MODIFY `vragenID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- Beperkingen voor tabel `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `ticket_blok_fk` FOREIGN KEY (`blokID`) REFERENCES `blokken` (`blokID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_campus_fk` FOREIGN KEY (`campusID`) REFERENCES `campussen` (`campusID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_hersteller_fk` FOREIGN KEY (`hersteller`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_lokaal_fk` FOREIGN KEY (`lokaalNummer`) REFERENCES `lokalen` (`lokaalNummer`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_aanmaker_FK` FOREIGN KEY (`aanmaker`) REFERENCES `users` (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
