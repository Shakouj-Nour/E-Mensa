use emensawerbeseite;

DROP TABLE IF EXISTS `bewertung`;
CREATE TABLE `bewertung`
(
    `gericht` VARCHAR(200) NOT NULL,
    `bemerkung` VARCHAR(200) NOT NULL,
    `zeit` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `sterne` INT NOT NULL,
    `highlight` BOOL
);

/* dummy data */
INSERT INTO `bewertung`(`GERICHT`, `BEMERKUNG`, `STERNE`, `HIGHLIGHT`)
VALUES('Kartoffeln', 'sehr lecker, wuerde empfohlen', 5, 1 );