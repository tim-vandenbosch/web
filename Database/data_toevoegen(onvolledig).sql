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

INSERT
INTO
  `tickets`(
    `ticketID`,
    `onderwerp`,
    `prioriteit`,
    `type`,
    `campusID`,
    `blokID`,
    `lokaalNummer`,
    `datum`,
    `omschrijving`,
    `bijlage`,
    `herstellingDatum`,
    `deadline`,
    `hersteller`,
    `status`,
    `aanmaker`
  )
VALUES(
  2,
  'Stoel kapot',
  'Gemiddeld (1 week)',
  'Faciliteiten',
  2,
  2,
  45,
  '2016-05-02',
  'Een stoelpoot is afgebroken.',
  '',
  '2016-05-06',
  '2016-05-09',
  2,
  'In behandeling',
  NULL
),(
  3,
  'Licht flikkert',
  'Hoog (2 dagen)',
  'Elektriciteit',
  4,
  3,
  44,
  '2016-05-13',
  'Een lamp moet dringend vervangen worden. Deze flikkerde tijdens de avondles.',
  '',
  '2016-05-16',
  '2016-05-17',
  3,
  'Geparkeerd',
  NULL
),(
  4,
  'Raam gebarsten',
  'Dringend (4 uur)',
  'Faciliteiten',
  3,
  4,
  146,
  '2016-04-18',
  'Door een ongeluk is een raam gebarsten. ',
  '',
  '2016-04-19',
  '2016-04-19',
  1,
  'Geparkeerd',
  NULL
);