-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 15 mei 2016 om 16:52
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
  `bijlage` blob NOT NULL,
  `herstellingDatum` date NOT NULL,
  `deadline` date NOT NULL,
  `hersteller` int(11) NOT NULL,
  `status` enum('Geparkeerd','Afgesloten','In behandeling','Geannuleerd','Bevroren','Voltooid') NOT NULL DEFAULT 'Geparkeerd'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tickets`
--

INSERT INTO `tickets` (`ticketID`, `aanmaker`, `onderwerp`, `prioriteit`, `type`, `campusID`, `blokID`, `lokaalNummer`, `datum`, `omschrijving`, `bijlage`, `herstellingDatum`, `deadline`, `hersteller`, `status`) VALUES
(1, 4, 'Beamer kapot', 'Kritiek (1 uur)', 'Elektriciteit', 1, 1, 41, '2016-04-28', 'Beamer gaat niet meer aan.', '', '2016-04-29', '2016-05-02', 3, 'In behandeling'),
(2, 4, 'Stoel kapot', 'Hoog (2 dagen)', 'Elektriciteit', 1, 1, 41, '2016-05-08', 'Stoelpoot kapot', '', '2016-05-11', '2016-05-14', 3, 'Afgesloten'),
(3, 1, 'Beamer kapot', 'Kritiek (1 uur)', 'Elektriciteit', 1, 2, 41, '2016-04-28', 'Beamer gaat niet meer aan.', '', '2016-04-29', '2016-05-02', 3, 'In behandeling'),
(4, 2, 'Stoel kapot', 'Gemiddeld (1 week)', 'Faciliteiten', 2, 2, 41, '2016-05-02', 'Een stoelpoot is afgebroken.', '', '2016-05-06', '2016-05-09', 2, 'In behandeling'),
(5, 3, 'Licht flikkert', 'Hoog (2 dagen)', 'Elektriciteit', 2, 4, 145, '2016-05-13', 'Een lamp moet dringend vervangen worden. Deze flikkerde tijdens de avondles.', '', '2016-05-16', '2016-05-17', 3, 'Geparkeerd'),
(6, 2, 'Raam gebarsten', 'Dringend (4 uur)', 'Faciliteiten', 3, 3, 145, '2016-04-18', 'Door een ongeluk is een raam gebarsten. ', '', '2016-04-19', '2016-04-19', 1, 'Geparkeerd'),
(7, 1, 'Verwarming gaat niet aan. ', 'Dringend (4 uur)', 'Elektriciteit', 4, 4, 146, '2016-01-05', 'De klaslokaal is erg koud. De verwarmingen doen het niet.', '', '2016-01-06', '2016-01-07', 1, 'Geparkeerd'),
(8, 3, 'Macscherm werkt niet.', 'Gemiddeld (1 week)', 'IT', 3, 4, 146, '2016-05-08', 'Een mac scherm op de 2de rij links werkt niet meer. ', '', '2016-05-13', '2016-05-18', 2, 'Bevroren');

--
-- Indexen voor geëxporteerde tabellen
--

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
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticketID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Beperkingen voor geëxporteerde tabellen
--

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
