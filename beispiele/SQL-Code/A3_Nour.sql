use emensawerbeseite;

SELECT * FROM gericht; # 1
SELECT erfasst_am FROM gericht; #2
SELECT erfasst_am , gericht.name AS Gerichtname FROM  gericht ORDER BY Gerichtname ASC;#3
SELECT gericht.name, gericht.beschreibung FROM gericht ORDER BY gericht.name LIMIT 5; #4
SELECT gericht.name, gericht.beschreibung FROM gericht ORDER BY gericht.name LIMIT 10 OFFSET 5; #5
SELECT DISTINCT allergen.typ FROM allergen;#6



