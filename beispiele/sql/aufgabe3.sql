SELECT * FROM gericht; -- 1. Alle Daten aller Gerichte.
SELECT erfasst_am FROM gericht; -- 2. Das Erfassungsdatum aller Gerichte.
SELECT name, erfasst_am FROM gericht ORDER BY name DESC; -- 3.  Das Erfassungsdatum sowie den Namen (als Attributname Gerichtname) allerGerichte absteigend sortiert nach Gerichtname.
SELECT name, beschreibung FROM gericht order by name ASC LIMIT 5; -- 4. Den Namen sowie die Beschreibung der Gerichte aufsteigend sortiert nachName, wobei nur 5 Datensätze dargestellt werden sollen.
SELECT name, beschreibung FROM gericht order by name ASC LIMIT 10 OFFSET 5; -- 5.
SELECT DISTINCT name FROM allergen; -- 6. Zeigen Sie alle möglichen Allergen-Typen (typ), wobei Sie keine doppelten Einträge darstellen.
SELECT * FROM gericht WHERE name like 'k%'; -- 7.  Namen von Gerichten, deren Name mit einem „K“ beginnt.
SELECT id, name FROM gericht WHERE name rlike 'suppe'; -- 8.
select * FROM kategorie WHERE eltern_id is null ; -- 9.
update allergen SET name = 'Kamut' where code = 'a6'; -- 10.
INSERT INTO gericht VALUES (2, 'Currywurst mit Pommes', 'a', '00-00-00', 0, 0, 2.3, 4); -- 11.
INSERT INTO gericht_hat_kategorie VALUES (2, 3); -- 11.