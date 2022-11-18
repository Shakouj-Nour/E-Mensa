SELECT COUNT(id) AS Anzahl_Der_Gerichte FROM gericht;

CREATE TABLE IF NOT EXISTS Newsletter(
    count int8 PRIMARY KEY AUTO_INCREMENT
);
INSERT INTO Newsletter VALUE (10);

SELECT * from Newsletter;


#DELETE Newsletter FROM Newsletter WHERE count=10;

CREATE TABLE IF NOT EXISTS besucher(
    count int8 PRIMARY KEY AUTO_INCREMENT
);
