SELECT gericht.name , gha.code FROM gericht
inner join gericht_hat_allergen gha on gericht.id = gha.gericht_id;#1

SELECT gericht.name As G_name ,GROUP_CONCAT(gha.code)  FROM gericht
inner join gericht_hat_allergen gha on gericht.id = gha.gericht_id
Group By G_name; #1

SELECT gericht.name As G_name ,GROUP_CONCAT(gha.code)  FROM gericht
left join gericht_hat_allergen gha on gericht.id = gha.gericht_id
Group By G_name; #2

SELECT gha.code ,gericht.name As G_name  FROM gericht
left join gericht_hat_allergen gha on gericht.id = gha.gericht_id
GROUP BY gha.code;#3

SELECT kategorie.name, COUNT(gericht_id) AS Anzahl_Gerichte_pro_Kategorie From kategorie
INNER JOIN gericht_hat_kategorie ghk on kategorie.id = ghk.kategorie_id
GROUP BY kategorie.name
ORDER BY Anzahl_Gerichte_pro_Kategorie ASC;#4

SELECT kategorie.name , COUNT(ghk.gericht_id) AS anzahlGerichte FROM kategorie
join gericht_hat_kategorie ghk on kategorie.id = ghk.kategorie_id
GROUP BY kategorie.name
HAVING anzahlGerichte >= 2;#5

SELECT kategorie.name , COUNT(ghk.gericht_id) AS anzahlGerichte FROM kategorie
join gericht_hat_kategorie ghk on kategorie.id = ghk.kategorie_id
GROUP BY kategorie.name
HAVING anzahlGerichte >= 4;#6


