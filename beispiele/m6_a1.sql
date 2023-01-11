use emensawerbeseite;

DROP TABLE IF EXISTS `bewertung`;
CREATE TABLE `bewertung`
(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `b_id` BIGINT REFERENCES tbl_benutzeren(b_id) ON UPDATE CASCADE ON DELETE CASCADE,
    `gericht_id` INT REFERENCES gericht(id) ON UPDATE CASCADE ON DELETE CASCADE,
    `bemerkung` VARCHAR(800) NOT NULL,
    `zeit` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `sterne` INT NOT NULL,
    `highlight` BOOL
);

/* dummy data */
INSERT INTO `bewertung`(`b_id`, `gericht_id`, `BEMERKUNG`, `STERNE`, `HIGHLIGHT`)
VALUES(1, 1, 'sehr lecker, wuerde empfohlen', 5, 1 );