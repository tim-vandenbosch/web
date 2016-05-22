INSERT
INTO
  `blokken`(`blokID`,
  `campusID`,
  `blokLetter`)
VALUES('2', '1', 'A'),('3', '1', 'C'),('4', '1', 'D'),('5', '1', 'E'),('6', '1', 'F'),('7', '1', 'G');
INSERT
INTO
  `campussen`(`campusID`,
  `naam`)
VALUES('2', 'Guffenslaan'),('3', 'Vildersstraat'),('4', 'Quartier Canal'),('5', 'Diepenbeek');
INSERT
INTO
  `lokalen`(`lokaalNummer`,
  `blokID`)
VALUES('042', '1'),('043', '1'),('044', '1'),('045', '1'),('046', '1'),('141', '1'),('142', '1'),('143', '1'),('144', '2'),('145', '1'),('146', '3');

INSERT INTO `tickets` (`ticketID`, `onderwerp`, `prioriteit`, `type`, `campusID`, `blokID`, `lokaalNummer`, `datum`, `omschrijving`, `bijlage`, `herstellingDatum`, `deadline`, `hersteller`, `status`, `aanmaker`) VALUES
(1, 'Beamer kapot', 'Kritiek (1 uur)', 'Elektriciteit', 1, 2, 41, '2016-04-28', 'Beamer gaat niet meer aan.', '', '2016-04-29', '2016-05-02', 3, 'In behandeling', 1),
(2, 'Stoel kapot', 'Gemiddeld (1 week)', 'Faciliteiten', 2, 2, 41, '2016-05-02', 'Een stoelpoot is afgebroken.', '', '2016-05-06', '2016-05-09', 2, 'In behandeling', 2),
(3, 'Licht flikkert', 'Hoog (2 dagen)', 'Elektriciteit', 2, 4, 145, '2016-05-13', 'Een lamp moet dringend vervangen worden. Deze flikkerde tijdens de avondles.', '', '2016-05-16', '2016-05-17', 3, 'Geparkeerd', 3),
(4, 'Raam gebarsten', 'Dringend (4 uur)', 'Faciliteiten', 3, 3, 145, '2016-04-18', 'Door een ongeluk is een raam gebarsten. ', '', '2016-04-19', '2016-04-19', 1, 'Geparkeerd', 2),
(5, 'Verwarming gaat niet aan. ', 'Dringend (4 uur)', 'Elektriciteit', 4, 4, 146, '2016-01-05', 'De klaslokaal is erg koud. De verwarmingen doen het niet.', '', '2016-01-06', '2016-01-07', 1, 'Geparkeerd', 1),
(6, 'Macscherm werkt niet.', 'Gemiddeld (1 week)', 'IT', 3, 4, 146, '2016-05-08', 'Een mac scherm op de 2de rij links werkt niet meer. ', '', '2016-05-13', '2016-05-18', 2, 'Bevroren', 3);
