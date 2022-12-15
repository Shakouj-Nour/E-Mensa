CREATE VIEW view_suppengerichte AS
    SELECT * FROM gericht WHERE name LIKE '%suppe%'; -- 1

CREATE VIEW view_anmeldungen AS
    SELECT anzahlanmeldungen, name FROM benutzer ORDER BY
    anzahlanmeldungen DESC ; -- 2

CREATE VIEW view_kategoriegerichte_vegetarisch AS
    SELECT name FROM gericht WHERE vegetarisch = 1, kategorie.name AS kategorie  FROM
    gericht LEFT JOIN kategorie on gericht.id = kategorie.id;