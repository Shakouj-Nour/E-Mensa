CREATE VIEW view_suppengerichte AS
    SELECT * FROM gericht WHERE name LIKE '%suppe%'; -- 1

CREATE VIEW view_anmeldungen AS
    SELECT anzahlanmeldungen, name FROM benutzer ORDER BY
    anzahlanmeldungen DESC ; -- 2

create view view_kategoriegerichte_vegetarisch as
    select gericht.name as gericht, kategorie.name as kategorie from gericht
    join gericht_hat_kategorie on gericht.id = gericht_hat_kategorie.gericht_id
    right join kategorie on kategorie.id = gericht_hat_kategorie.kategorie_id and
    gericht.vegetarisch = 1; -- 3
