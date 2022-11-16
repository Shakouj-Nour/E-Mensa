CREATE DATABASE IF NOT EXISTS emensawerbeseite
    CHARACTER SET UTF8mb4
    COLLATE utf8mb4_unicode_ci;

USE emensawerbeseite;

CREATE TABLE `gericht`(
                          `id` INTEGER(8) PRIMARY KEY, -- Primaerschluessel.
                          `name` VARCHAR(80) NOT NULL UNIQUE, -- Name Des Gerichts, Ein Name ist eindeutig.
                          `beschreibung` VARCHAR(800) NOT NULL, -- Beschreibung des Gerichts.
                          `erfasst_am` date NOT NULL, -- Zeitpunkt der ersten Erfassung des Gerichts.
                          `vegetarisch` boolean not null, -- Markierung, ob das Gericht vegetarisch ist. Standard: Nein.
                          `vegan` boolean not null, -- Markierung, ob das Gericht vegan ist. Standard: Nein.
                          `preis_intern` double not null, -- Preis für interne Personen (wie Studierende). Es gilt immer preis_intern > 0
                          `preis_extern` double not null -- Preis für externe Personen (wie Gastdozent:innen).
);
CREATE TABLE `allergen`(
                           `code` CHAR(4) PRIMARY KEY, -- Offizieller Abkürzungsbuchstabe für das Allergen.
                           `name` varchar(300) not null, --  Name des Allergens, wie „Glutenhaltiges Getreide“.
                           `typ` varchar(20) not null --  Gibt den Typ an. Standard: „allergen“
);

CREATE TABLE `kategorie`(
                            `id` int(8) primary key,
                            `name` varchar(80) not null,
                            `eltern_id` int(8),
                            `bildname` varchar(200)
);
CREATE TABLE `gericht_hat_allergen`(
                                       `code` char(4),
                                       `gericht_id` int(8) not null
);
CREATE TABLE `gericht_hat_kategorie`(
                                        `gericht_id` int(8) not null,
                                        `kategorie_id` int(8) not null
);
SHOW COLUMNS FROM gericht;