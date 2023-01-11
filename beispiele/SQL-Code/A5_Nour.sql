use emensawerbeseite;

SELECT gericht.name AS Name,gericht.preis_intern AS Preis_intern,gericht.preis_extern AS Preis_extern
FROM gericht
ORDER BY Name ASC
LIMIT 5; #1


SELECT allergen.code, allergen.name , allergen.typ FROM allergen;

SELECT * from gericht;
SELECT gericht.name AS Name,gericht.preis_intern AS Preis_intern,gericht.preis_extern AS Preis_extern,
    GROUP_CONCAT(gha.code) As G_code FROM gericht
    left join gericht_hat_allergen gha on gericht.id = gha.gericht_id
Group By Name
LIMIT 5