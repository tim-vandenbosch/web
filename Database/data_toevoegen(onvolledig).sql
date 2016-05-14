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