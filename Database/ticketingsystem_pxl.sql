-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 20 mei 2016 om 13:30
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
  `aanmaker` int(3) NOT NULL,
  `onderwerp` varchar(500) NOT NULL,
  `prioriteit` enum('Kritiek (1 uur)','Dringend (4 uur)','Hoog (2 dagen)','Gemiddeld (1 week)','Laag (3 maanden)') NOT NULL,
  `type` enum('IT','Elektriciteit','Faciliteiten','') NOT NULL,
  `campusID` int(5) NOT NULL,
  `blokID` int(5) NOT NULL,
  `lokaalNummer` int(5) NOT NULL,
  `datum` date NOT NULL,
  `omschrijving` varchar(1024) NOT NULL,
  `bijlage` blob,
  `herstellingDatum` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `hersteller` int(11) DEFAULT NULL,
  `status` enum('Geparkeerd','Afgesloten','In behandeling','Geannuleerd') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tickets`
--

INSERT INTO `tickets` (`ticketID`, `aanmaker`, `onderwerp`, `prioriteit`, `type`, `campusID`, `blokID`, `lokaalNummer`, `datum`, `omschrijving`, `bijlage`, `herstellingDatum`, `deadline`, `hersteller`, `status`) VALUES
(1, 4, 'Beamer kapot', 'Gemiddeld (1 week)', 'Elektriciteit', 1, 1, 41, '2016-04-28', 'Beamer gaat niet meer aan.', '', '2016-04-30', '2016-05-10', 5, 'Geparkeerd'),
(2, 4, 'Stoel kapot', 'Hoog (2 dagen)', 'Elektriciteit', 1, 1, 41, '2016-05-08', 'Stoelpoot kapot', '', '2016-05-11', '2016-05-14', 5, 'Afgesloten'),
(3, 1, 'Beamer kapot', 'Kritiek (1 uur)', 'Elektriciteit', 1, 2, 41, '2016-04-28', 'Beamer gaat niet meer aan.', '', '2016-04-29', '2016-05-02', 3, 'In behandeling'),
(4, 2, 'Stoel kapot', 'Hoog (2 dagen)', 'Faciliteiten', 2, 2, 41, '2016-05-02', 'Een stoelpoot is afgebroken.', '', '2016-05-06', '2016-05-09', 3, 'In behandeling'),
(5, 3, 'Licht flikkert', 'Gemiddeld (1 week)', 'Elektriciteit', 2, 4, 145, '2016-05-13', 'Een lamp moet dringend vervangen worden. Deze flikkerde tijdens de avondles.', '', '2016-05-16', '2016-05-17', 6, ''),
(6, 2, 'Raam gebarsten', 'Dringend (4 uur)', 'Faciliteiten', 3, 3, 145, '2016-04-18', 'Door een ongeluk is een raam gebarsten. ', '', '2016-04-19', '2016-04-19', 3, 'Geparkeerd'),
(7, 1, 'Verwarming gaat niet aan. ', 'Hoog (2 dagen)', 'Elektriciteit', 4, 4, 146, '2016-01-05', 'De klaslokaal is erg koud. De verwarmingen doen het niet.', '', '2016-01-06', '2016-01-07', 3, 'Afgesloten'),
(8, 3, 'Macscherm werkt niet.', 'Gemiddeld (1 week)', 'IT', 3, 4, 146, '2016-05-08', 'Een mac scherm op de 2de rij links werkt niet meer. ', '', '2016-05-13', '2016-05-18', 3, '');

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
(4, 'docent1@pxl.be', 'ab642ce62f55b2ca05b4697f3bd7b53a', 'Docent', 1, ''),
(5, 'wm2@pxl.be', 'ab642ce62f55b2ca05b4697f3bd7b53a', 'Werkman', 1, ''),
(6, 'wm3@pxl.be', 'ab642ce62f55b2ca05b4697f3bd7b53a', 'Werkman', 1, ''),
(7, 'docent2@pxl.be', 'ab642ce62f55b2ca05b4697f3bd7b53a', 'Docent', 1, ''),
(8, 'docent2@pxl.be', 'ab642ce62f55b2ca05b4697f3bd7b53a', 'Docent', 1, '');

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
  ADD KEY `userID` (`aanmaker`),
  ADD KEY `lokaalID` (`lokaalNummer`),
  ADD KEY `campusID` (`campusID`),
  ADD KEY `blokID` (`blokID`),
  ADD KEY `aanmaker` (`aanmaker`),
  ADD KEY `hersteller` (`hersteller`),
  ADD KEY `lokaal` (`lokaalNummer`),
  ADD KEY `campus` (`campusID`),
  ADD KEY `blok` (`blokID`);

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
  MODIFY `antwoordID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticketID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  ADD CONSTRAINT `ticket_aanmaker_fk` FOREIGN KEY (`aanmaker`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_blok_fk` FOREIGN KEY (`blokID`) REFERENCES `blokken` (`blokID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_campus_fk` FOREIGN KEY (`campusID`) REFERENCES `campussen` (`campusID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_hersteller_fk` FOREIGN KEY (`hersteller`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_lokaal_fk` FOREIGN KEY (`lokaalNummer`) REFERENCES `lokalen` (`lokaalNummer`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
