CREATE VIEW view_suppengerichte AS
    SELECT * FROM gericht WHERE name LIKE '%suppe%'; -- 1

CREATE VIEW view_anmeldungen AS
    SELECT b_anzahlAnmeldung, b_name FROM tbl_benutzeren ORDER BY
    b_anzahlAnmeldung DESC ; -- 2

create view view_kategoriegerichte_vegetarisch as
    select gericht.name as gericht, kategorie.name as kategorie from gericht
    join gericht_hat_kategorie on gericht.id = gericht_hat_kategorie.gericht_id
    right join kategorie on kategorie.id = gericht_hat_kategorie.kategorie_id and
    gericht.vegetarisch = 1; -- 3

-- A5

CREATE PROCEDURE update_anmeldung(IN id BIGINT, IN dt DATETIME)
    BEGIN
        START TRANSACTION;
        UPDATE tbl_benutzeren SET b_anzahlAnmeldung = tbl_benutzeren.b_anzahlAnmeldung + 1,
        b_letzteAnmeldung = dt WHERE tbl_benutzeren.b_id = id;
        COMMIT;
    END
